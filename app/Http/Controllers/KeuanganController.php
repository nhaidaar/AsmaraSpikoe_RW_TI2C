<?php

namespace App\Http\Controllers;

use App\Models\KeuanganModel;
use App\Models\RTModel;
use App\Models\WargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
    protected $active = 'keuangan';

    public function index()
    {
        $active = $this->active;

        // Default rt is 1
        $rt = 1;

        // If user not ketua rw, choose their rt
        if (Auth::check() && Auth::user()->level != 'rw') {
            $user = WargaModel::with('detailKK.kartuKeluarga')->find(Auth::user()->warga_id);
            $rt = $user->detailKK->kartuKeluarga->rt;
        }

        $keuangan = KeuanganModel::all();
        $totalPemasukan = KeuanganModel::where('jenis_keuangan', 'Pemasukkan')->sum('nominal');
        $totalPengeluaran = KeuanganModel::where('jenis_keuangan', 'Pengeluaran')->sum('nominal');
        $totalKas = $totalPemasukan - $totalPengeluaran;

        return view('keuangan.index', compact('active', 'rt', 'keuangan', 'totalPengeluaran', 'totalKas'));
    }

    public function create()
    {
        return view('keuangan.create', [
            'active' => $this->active
        ]);
    }
}
