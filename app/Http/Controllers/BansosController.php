<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBansosModel;
use App\Models\RTModel;
use App\Models\WargaModel;
use Illuminate\Http\Request;

class BansosController extends Controller
{
    protected $active = 'bansos';

    public function index()
    {
        return view('bansos.index', [
            'active' => $this->active,
        ]);
    }

    public function proses(Request $request)
    {
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

        $findNik = WargaModel::where('nik', $request->nik)->first();

        if (!$findNik) {
            return back()->withErrors('NIK yang anda masukkan salah');
        }

        $tanggalLahir = $request->tahun . '-' . str_pad($request->bulan, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->tanggal, 2, '0', STR_PAD_LEFT);

        if ($findNik->tanggal_lahir != $tanggalLahir) {
            return back()->withErrors('Tanggal lahir tidak valid');
        }

        $bansos = PenerimaBansosModel::with([
            'bansos', 'kriteriaPenerima.pendaftarBansos.detailWarga'
        ])->whereHas(
            'kriteriaPenerima.pendaftarBansos.detailWarga',
            function ($query) use ($findNik) {
                $query->where('warga_id', $findNik->warga_id);
            }
        )->get();

        $noTeleponRT = RTModel::whereHas(
            'kartuKeluarga.detailKK.anggotaKeluarga',
            function ($query) use ($findNik) {
                $query->where('warga_id', $findNik->warga_id);
            }
        )
            ->pluck('no_telepon')
            ->first();

        return view('bansos.detail', [
            'active' => $this->active,
            'bansos' => $bansos,
            'admin' => $noTeleponRT,
        ]);
    }
}
