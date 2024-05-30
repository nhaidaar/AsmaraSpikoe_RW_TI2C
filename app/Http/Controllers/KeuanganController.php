<?php

namespace App\Http\Controllers;

use App\Models\RTModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
    protected $active = 'keuangan';

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

        return view('keuangan.index', [
            'active' => 'keuangan', 
            'rt' => $rt,
        ]);
    }

    public function create(){
        return view ('keuangan.create_transaksi', [
            'active' => $this->active
        ]);
    }
}
