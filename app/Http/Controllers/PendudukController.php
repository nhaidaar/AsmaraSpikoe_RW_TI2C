<?php

namespace App\Http\Controllers;

use App\Models\DetailKKModel;
use App\Models\KKModel;
use App\Models\PenerimaBansosModel;
use App\Models\RTModel;
use App\Models\WargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendudukController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // If user not authenticated
        if (!$user) {
            return redirect()->route('index');
        }

        // Default rt is 1
        $rt = 1;

        // If user not ketua rw, choose their rt
        if ($user->level != 'rw') {
            $rt = RTModel::whereHas('kartuKeluarga.detailKK.anggotaKeluarga', function ($q) use ($user) {
                $q->where('warga_id', $user->warga_id);
            })
                ->pluck('rt_id')
                ->first();
        }

        // Get all warga with join another table
        $warga = WargaModel::with(['detailKK.kartuKeluarga'])->get();

        // Get all kk with join another table (based on Kepala Keluarga)
        $keluarga = DetailKKModel::with([
            'anggotaKeluarga', 'kartuKeluarga'
        ])->whereHas('statusHubungan', function ($q) {
            $q->where('hubungan_id', 1);
        })->get();

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
}
