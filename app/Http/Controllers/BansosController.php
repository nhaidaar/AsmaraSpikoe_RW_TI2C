<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBansosModel;
use App\Models\RTModel;
use App\Models\WargaModel;
use Illuminate\Http\Request;
use App\Traits\ValidationTrait;
use Illuminate\Support\Facades\Auth;

class BansosController extends Controller
{
    use ValidationTrait;

    protected $active = 'bansos';

    public function index()
    {
        $user = Auth::user();

        if ($user) {
            return view('layout.maintenance', [
                'active' => $this->active,
            ]);
        }

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

        $validationError = $this->matchNIKwithBirth($request->nik, $request->all());

        if ($validationError) {
            return back()->withErrors($validationError);
        }

        $warga = WargaModel::where('nik', $request->nik)
            ->first();

        $bansos = PenerimaBansosModel::with([
            'bansos', 'kriteriaPenerima.pendaftarBansos.detailWarga'
        ])->whereHas(
            'kriteriaPenerima.pendaftarBansos.detailWarga',
            function ($query) use ($warga) {
                $query->where('warga_id', $warga->warga_id);
            }
        )->get();

        $noTeleponRT = RTModel::whereHas(
            'kartuKeluarga.detailKK.anggotaKeluarga',
            function ($query) use ($warga) {
                $query->where('warga_id', $warga->warga_id);
            }
        )
            ->pluck('no_telepon')
            ->first();

        return view('bansos.detail', [
            'active' => $this->active,
            'warga' => $warga,
            'bansos' => $bansos,
            'admin' => $noTeleponRT,
        ]);
    }
}
