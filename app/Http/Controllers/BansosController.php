<?php

namespace App\Http\Controllers;

use App\Models\DetailWargaModel;
use App\Models\PenerimaBansosModel;
use App\Models\RTModel;
use App\Models\WargaModel;
use App\Traits\RtTrait;
use Illuminate\Http\Request;
use App\Traits\PendudukTrait;
use Illuminate\Support\Facades\Auth;
use App\Helpers\MAUT;
use App\Models\BansosModel;
use App\Models\DetailMautModel;
use App\Models\MautModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BansosController extends Controller
{
    use PendudukTrait;
    use RtTrait;

    protected $active = 'bansos';

    public function index()
    {
        $active = $this->active;

        if (Auth::check()) {
            return redirect()->route('indexPenerimaBansos');
        }

        return view('bansos.index', compact('active'));
    }

    public function proses(Request $request)
    {
        $active = $this->active;

        $request->validate([
            'nik' => 'required|min:16',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required'
        ], [
            'nik.required' => 'Format NIK tidak sesuai',
            'nik.min' => 'Format NIK tidak sesuai',
            'tanggal.required' => 'Format Tanggal Lahir tidak sesuai',
            'bulan.required' => 'Format Tanggal Lahir tidak sesuai',
            'tahun.required' => 'Format Tanggal Lahir tidak sesuai',
        ]);

        $validationError = $this->matchNIKwithBirth($request->nik, $request->all());

        if ($validationError) {
            return back()
                ->withInput()
                ->withErrors($validationError);
        }

        $warga = WargaModel::where('nik', $request->nik)->first();

        $nik = $this->censoredNIK($warga->nik);

        $bansos = PenerimaBansosModel::with(['bansos', 'warga'])
            ->whereHas('warga', function ($q) use ($warga) {
                $q->where('warga_id', $warga->warga_id);
            })
            ->get();

        $admin = RTModel::where('ketua_rt', $warga->warga_id)
            ->pluck('no_telepon')
            ->first();

        return view('bansos.detail', compact('active', 'warga', 'nik', 'bansos', 'admin'));
    }

    public function index_penerima(Request $request)
    {
        $active = $this->active;

        $cardActive = 'penerima';

        $warga = PenerimaBansosModel::with(['bansos', 'warga.detailKK.kartuKeluarga'])
            ->where('periode_bulan', now()->month)
            ->where('periode_tahun', now()->year)
            ->orderBy('bansos_id')
            ->paginate(5);

        if ($request->ajax()) {
            $warga = PenerimaBansosModel::with(['bansos', 'warga.detailKK.kartuKeluarga'])
                ->whereHas('warga', function ($q) use ($request) {
                    $q->where('nama_warga', 'like', "%$request->search%");
                })
                ->whereHas('warga.detailKK.kartuKeluarga', function ($q) use ($request) {
                    if ($request->rt != '') {
                        $q->where('rt', $request->rt);
                    }
                })
                ->where('periode_bulan', $request->periode)
                ->where('periode_tahun', now()->year)
                ->paginate(5);

            return view('bansos.penerima.child', compact('warga'))->render();
        }

        return view('bansos.penerima.index', compact('active', 'cardActive', 'warga'));
    }

    public function delete_penerima(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'penerima_id' => 'required',
        ]);

        if ($validate->fails()) {
            return back()
                ->withInput()
                ->withErrors('Permintaan hapus penerima bansos tidak valid');
        }

        DB::beginTransaction();
        try {
            $warga = PenerimaBansosModel::with('warga')->find($request->penerima_id);
            PenerimaBansosModel::destroy($request->penerima_id);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors('Gagal menghapus penerima bansos, coba lagi');
        }

        return redirect()
            ->route('indexPenerimaBansos')
            ->with('success', 'Berhasil menghapus data penerima bansos ' . $warga->warga->nama_warga);
    }

    public function index_perhitungan(Request $request)
    {
        $active = $this->active;

        $cardActive = 'perhitungan';

        $maut = MautModel::with(['warga.detailKK.kartukeluarga'])
            // ->orderBy('skor_akhir', 'DESC')
            ->paginate(5);

        if ($request->ajax()) {
            $maut = MautModel::with(['warga.detailKK.kartukeluarga'])
                ->whereHas('warga', function ($q) use ($request) {
                    $q->where('nama_warga', 'like', "%$request->search%");
                })
                ->whereHas('warga.detailKK.kartuKeluarga', function ($q) use ($request) {
                    if ($request->rt != '') {
                        $q->where('rt', $request->rt);
                    }
                })
                ->orderBy('skor_akhir', 'DESC')
                ->paginate(5);

            return view('bansos.perhitungan.child', compact('maut'))->render();
        }

        return view('bansos.perhitungan.index', compact('active', 'cardActive', 'maut'));
    }

    public function hitung()
    {
        // Clear the table
        DB::statement("SET foreign_key_checks=0");
        DetailMautModel::truncate();
        MautModel::truncate();
        DB::statement("SET foreign_key_checks=1");

        $kriteria = [
            'pendapatan',
            'jumlah_kendaraan',
            'bpjs',
            'luas_rumah',
            'jumlah_tanggungan',
            'pbb',
            'tagihan_listrik',
            'tagihan_air',
            'tanggungan_pendidikan'
        ];

        $bobot = [
            'pendapatan' => 0.3,
            'jumlah_kendaraan' => 0.05,
            'bpjs' => 0.05,
            'luas_rumah' => 0.1,
            'jumlah_tanggungan' => 0.15,
            'pbb' => 0.1,
            'tagihan_listrik' => 0.05,
            'tagihan_air' => 0.05,
            'tanggungan_pendidikan' => 0.15
        ];

        $maut = new MAUT($kriteria, $bobot);

        $wargaList = WargaModel::with('detailKK')
            ->where('status_warga', 'Hidup')
            ->get();

        // $wargaList = WargaModel::leftJoin('penerima_bansos', 'warga.warga_id', '=', 'penerima_bansos.warga_id')
        //     ->whereNull('penerima_bansos.warga_id')
        //     ->select('warga.*')
        //     ->get();

        // $wargaList = WargaModel::leftJoin('penerima_bansos', function ($q) {
        //     $q->on('warga.warga_id', '=', 'penerima_bansos.warga_id')
        //         ->where('penerima_bansos.periode_bulan', '=', now()->month)
        //         ->where('penerima_bansos.periode_tahun', '=', now()->year);
        // })
        //     ->whereNull('penerima_bansos.warga_id')
        //     ->select('warga.*')
        //     ->get();

        // $wargaList = WargaModel::whereDoesntHave('penerimaBansos', function ($q) {
        //     $q->where('periode_bulan', '=', now()->month)
        //         ->where('periode_tahun', '=', now()->year);
        // })
        //     ->get();

        foreach ($wargaList as $warga) {
            $detail = DetailWargaModel::where('warga_id', $warga->warga_id)->first();

            // Memastikan bahwa warga adalah kepala keluarga dan merupakan penduduk setempat
            if ($warga->detailKK->hubungan_id == 1 && $warga->alamat_domisili == $warga->alamat_ktp) {
                $values = [
                    'pendapatan' => $detail->pendapatan,
                    'jumlah_kendaraan' => $detail->jumlah_kendaraan,
                    'bpjs' => $detail->bpjs,
                    'luas_rumah' => $detail->luas_rumah,
                    'jumlah_tanggungan' => $detail->jumlah_tanggungan,
                    'pbb' => $detail->pbb,
                    'tagihan_listrik' => $detail->tagihan_listrik,
                    'tagihan_air' => $detail->tagihan_air,
                    'tanggungan_pendidikan' => $detail->tanggungan_pendidikan
                ];

                // Memastikan bahwa warga merupakan kepala keluarga yang memiliki detail tambahan yang diwajibkan
                if ($detail->luas_rumah != null) {
                    $maut->addAlternative($warga->warga_id, $values);
                }
            }
        }

        $maut->evaluate();
        $maut->saveResults();

        return redirect()
            ->route('indexPerhitunganBansos')
            ->with('success', 'Berhasil menghitung penerima bansos');
    }

    public function create($id)
    {
        $active = $this->active;

        $maut = MautModel::with(['warga', 'detailMaut.kriteria'])->find($id);

        $bansos = BansosModel::all();

        return view('bansos.perhitungan.create', compact('active', 'maut', 'bansos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'maut_id' => 'required',
            'warga_id' => 'required',
            'bansos_id' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ], [
            'maut_id.required' => 'Permintaan tidak valid',
            'warga_id.required' => 'Permintaan tidak valid',
            'bansos_id.required' => 'Mohon memilih jenis bantuan sosial',
            'bulan.required' => 'Mohon memilih periode bantuan sosial',
            'tahun.required' => 'Mohon memilih periode bantuan sosial',
        ]);

        DB::beginTransaction();
        try {
            PenerimaBansosModel::create([
                'warga_id' => $request->warga_id,
                'bansos_id' => $request->bansos_id,
                'periode_bulan' => $request->bulan,
                'periode_tahun' => $request->tahun
            ]);

            DetailMautModel::where('maut_id', $request->maut_id)->delete();
            MautModel::destroy($request->maut_id);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors('Gagal menambahkan penerima bansos, coba lagi');
        }

        return redirect()
            ->route('indexPenerimaBansos')
            ->with('success', 'Berhasil menambahkan penerima bansos');
    }

    public function show($id)
    {
        $active = $this->active;

        $maut = MautModel::with(['warga', 'detailMaut.kriteria'])->find($id);

        return view('bansos.perhitungan.show', compact('active', 'maut'));
    }
}
