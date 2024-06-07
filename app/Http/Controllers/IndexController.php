<?php

namespace App\Http\Controllers;

use App\Models\KKModel;
use App\Models\PengumumanModel;
use App\Models\WargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    protected $active = 'index';

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('penduduk');
        }

        $active = $this->active;
        $keluarga = KKModel::whereHas('detailKK.anggotaKeluarga', function ($q) {
            $q->where('status_warga', 'Hidup');
        })->count();
        $wargaAktif = WargaModel::where('status_warga', 'Hidup')->count();
        $wargaTidakAktif = WargaModel::where('status_warga', '!=', 'Hidup')->count();
        $pengumuman = PengumumanModel::orderBy('pengumuman_id', 'DESC')->take(4)->get();

        return view('index', compact('active', 'keluarga', 'wargaAktif', 'wargaTidakAktif' , 'pengumuman'));
    }
}
