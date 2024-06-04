<?php

namespace App\Http\Controllers;

use App\Models\KeuanganModel;
use App\Models\RTModel;
use App\Models\WargaModel;
use App\Traits\RtTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
    use RtTrait;

    protected $active = 'keuangan';

    public function index()
    {
        $active = $this->active;

        $rt = $this->checkRT();

        $keuangan = KeuanganModel::all();
        $totalPemasukan = KeuanganModel::where('jenis_keuangan', 'Pemasukkan')->sum('nominal');
        $totalPengeluaran = KeuanganModel::where('jenis_keuangan', 'Pengeluaran')->sum('nominal');
        $totalKas = $totalPemasukan - $totalPengeluaran;

        return view('keuangan.index', compact('active', 'rt', 'keuangan', 'totalPengeluaran', 'totalKas'));
    }

    public function create()
    {
        $active = $this->active;

        return view('keuangan.create', compact('active'));
    }
}
