<?php

namespace App\Http\Controllers;

use App\Models\DetailWargaModel;
use App\Models\PenerimaBansosModel;
use App\Models\RTModel;
use App\Models\WargaModel;
use App\Traits\RtTrait;
use Illuminate\Http\Request;
use App\Traits\ValidationTrait;
use Illuminate\Support\Facades\Auth;
use App\Helpers\MAUT;
use App\Models\DetailMautModel;
use App\Models\MautModel;
use Illuminate\Support\Facades\DB;

class BansosController extends Controller
{
    use ValidationTrait;
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

        $bansos = PenerimaBansosModel::with(['bansos', 'warga'])
            ->whereHas('warga', function ($q) use ($warga) {
                $q->where('warga_id', $warga->warga_id);
            })
            ->get();

        $admin = RTModel::where('ketua_rt', $warga->warga_id)
            ->pluck('no_telepon')
            ->first();

        return view('bansos.detail', compact('active', 'warga', 'bansos', 'admin'));
    }

    public function index_penerima(Request $request)
    {
        $active = $this->active;

        $cardActive = 'penerima';

        $rt = $this->checkRT();

        $warga = PenerimaBansosModel::with(['bansos', 'warga.detailKK.kartuKeluarga'])
            ->whereHas('warga.detailKK.kartuKeluarga', function ($q) use ($rt) {
                $q->where('rt', $rt);
            })
            ->paginate(5);

        if ($request->ajax()) {
            $warga = PenerimaBansosModel::with(['bansos', 'warga.detailKK.kartuKeluarga'])
                ->whereHas('warga', function ($q) use ($request) {
                    $q->where('nama_warga', 'like', "%$request->search%");
                })
                ->whereHas('warga.detailKK.kartuKeluarga', function ($q) use ($request) {
                    $q->where('rt', $request->rt);
                })
                ->paginate(5);

            return view('bansos.penerima.child', compact('warga'))->render();
        }

        return view('bansos.penerima.index', compact('active', 'cardActive', 'rt', 'warga'));
    }

    public function index_perhitungan(Request $request)
    {
        $active = $this->active;

        $cardActive = 'perhitungan';

        // $rt = $this->checkRT();
        $rt = '';

        $maut = MautModel::with(['warga.detailKK.kartukeluarga'])
            // ->whereHas('warga.detailKK.kartuKeluarga', function ($q) use ($rt) {
            //     $q->where('rt', $rt);
            // })
            ->orderBy('skor_akhir', 'DESC')
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

        return view('bansos.perhitungan.index', compact('active', 'cardActive', 'rt', 'maut'));
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

        $wargaList = WargaModel::all();
        foreach ($wargaList as $warga) {
            $detail = DetailWargaModel::where('warga_id', $warga->warga_id)->first();
            if ($detail) {
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
                $maut->addAlternative($warga->warga_id, $values);
            }
        }

        $maut->evaluate();
        $maut->saveResults();

        return redirect()
            ->route('indexPerhitunganBansos')
            ->with('success', 'Berhasil menghitung penerima bansos');
    }

    public function create()
    {
        $active = $this->active;

        $rt = $this->checkRT();

        return view('bansos.perhitungan.create', compact('active', 'rt'));
    }

    public function show($id)
    {
        $active = $this->active;

        $rt = $this->checkRT();

        $maut = MautModel::with(['warga', 'detailMaut.kriteria'])->find($id);

        return view('bansos.perhitungan.show', compact('active', 'rt', 'maut'));
    }
}
