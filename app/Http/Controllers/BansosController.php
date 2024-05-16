<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBansosModel;
use App\Models\RTModel;
use Illuminate\Http\Request;
use App\Traits\ValidationTrait;

class BansosController extends Controller
{
    use ValidationTrait;

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

        $validationError = $this->validateWarga($request->nik, $request->all());

        if ($validationError) {
            return back()->withErrors($validationError);
        }

        $bansos = PenerimaBansosModel::with([
            'bansos', 'kriteriaPenerima.pendaftarBansos.detailWarga'
        ])->whereHas(
            'kriteriaPenerima.pendaftarBansos.detailWarga',
            function ($query) use ($request) {
                $query->where('warga_id', $request->nik);
            }
        )->get();

        $noTeleponRT = RTModel::whereHas(
            'kartuKeluarga.detailKK.anggotaKeluarga',
            function ($query) use ($request) {
                $query->where('warga_id', $request->nik);
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
