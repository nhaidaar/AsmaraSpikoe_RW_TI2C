<?php

namespace App\Http\Controllers;

use App\Models\DetailKKModel;
use App\Models\DetailWargaModel;
use App\Models\KKModel;
use App\Models\PekerjaanModel;
use App\Models\PenerimaBansosModel;
use App\Models\RTModel;
use App\Models\WargaModel;
use App\Traits\ValidationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PendudukController extends Controller
{
    use ValidationTrait;

    public function index()
    {
        // Default rt is 1
        $rt = 1;

        // If user not ketua rw, choose their rt
        $user = Auth::user();
        if ($user->level != 'rw') {
            $rt = RTModel::whereHas('kartuKeluarga.detailKK.anggotaKeluarga', function ($q) use ($user) {
                $q->where('warga_id', $user->warga_id);
            })
                ->pluck('rt_id')
                ->first();
        }

        // Get all warga with join another table
        $warga = WargaModel::with(['detailKK.kartuKeluarga'])->orderBy('nama_warga')->get();

        // Get all kk with join another table (based on Kepala Keluarga)
        $keluarga = DetailKKModel::with([
            'anggotaKeluarga', 'kartuKeluarga'
        ])->whereHas('statusHubungan', function ($q) {
            $q->where('hubungan_id', 1);
        })->get()
            ->sortBy(function ($keluarga) {
                return $keluarga->anggotaKeluarga->nama_warga;
            });

        // Count jumlah penerima bansos
        $jumlahPenerimaBansos = PenerimaBansosModel::groupBy('penerima_bansos')->count();

        return view('penduduk.index', [
            'active' => 'penduduk',
            'rt' => $rt,
            'warga' => $warga,
            'keluarga' => $keluarga,
            'jumlahPenerimaBansos' => $jumlahPenerimaBansos
        ]);
    }

    public function create_keluarga()
    {
        // Default rt is 1
        $rt = 1;

        // If user not ketua rw, choose their rt
        $user = Auth::user();
        if ($user->level != 'rw') {
            $rt = RTModel::whereHas('kartuKeluarga.detailKK.anggotaKeluarga', function ($q) use ($user) {
                $q->where('warga_id', $user->warga_id);
            })
                ->pluck('rt_id')
                ->first();
        }

        // Get all pekerjaan
        $pekerjaan = PekerjaanModel::all();

        return view('penduduk.create', [
            'active' => 'penduduk',
            'rt' => $rt,
            'pekerjaan' => $pekerjaan
        ]);
    }

    public function store_keluarga(Request $request)
    {
        // Validate KK
        if ($response = $this->validateKK($request)) {
            return $response;
        }
        // Validate Kepala Keluarga
        if ($response = $this->validateWarga($request)) {
            return $response;
        }
        // Validate Detail Tambahan
        if ($response = $this->validateDetailTambahan($request)) {
            return $response;
        }

        $tanggal_lahir = $request->tahun . '-' . str_pad($request->bulan, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->tanggal, 2, '0', STR_PAD_LEFT);

        DB::beginTransaction();

        try {
            $kk = KKModel::create([
                'no_kk' => $request->no_kk,
                'rt' => $request->rt_id,
            ]);

            $namaKK = $request->no_kk . '.png';
            $request->imageKK->move('kk/', $namaKK);

            $kepalaKeluarga = WargaModel::create([
                'nik' => $request->nik,
                'nama_warga' => $request->nama,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat_ktp' => $request->alamat_ktp,
                'alamat_domisili' => $request->alamat_domisili,
                'agama' => $request->agama,
                'status_perkawinan' => $request->status_perkawinan,
                'pekerjaan' => $request->pekerjaan,
            ]);

            $namaKTP = $request->nik . '.png';
            $request->imageKTP->move('ktp/', $namaKTP);

            DetailKKModel::create([
                'kk_id' => $kk->getKey(),
                'warga_id' => $kepalaKeluarga->getKey(),
                'hubungan_id' => 1,
            ]);

            DetailWargaModel::create([
                'warga_id' => $kepalaKeluarga->getKey(),
                'pendapatan' => $request->pendapatan,
                'luas_rumah' => $request->luas_bangunan,
                'jumlah_tanggungan' => $request->jumlah_tanggungan,
                'tanggungan_pendidikan' => $request->tanggungan_pendidikan,
                'pbb' => $request->pbb,
                'tagihan_listrik' => $request->tagihan_listrik,
                'tagihan_air' => $request->tagihan_air,
                'bpjs' => $request->bpjs,
                'jumlah_kendaraan' => $request->jumlah_kendaraan,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors('Gagal menambahkan KK, coba lagi')->withInput();
        }

        return redirect()->route('penduduk');
    }
}
