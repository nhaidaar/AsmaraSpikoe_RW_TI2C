<?php

namespace App\Http\Controllers;

use App\Models\KegiatanModel;
use App\Models\PengumumanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformasiController extends Controller
{
    protected $active = 'informasi';

    public function index()
    {
        $user = Auth::user();

        if ($user) {
            return view('layout.maintenance', [
                'active' => $this->active,
            ]);
        }

        $pengumumanList = PengumumanModel::orderBy('tanggal_waktu')->take(4)->get();
        $kegiatanList = KegiatanModel::where('tanggal_waktu', '>=', now())->get();

        return view('informasi.index', [
            'active' => $this->active,
            'pengumuman' => $pengumumanList,
            'kegiatan' => $kegiatanList
        ]);
    }

    public function detail($id)
    {
        $pengumuman = PengumumanModel::find($id);

        return view('informasi.detail', [
            'active' => $this->active,
            'pengumuman' => $pengumuman
        ]);
    }
}
