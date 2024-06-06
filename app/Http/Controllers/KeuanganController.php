<?php

namespace App\Http\Controllers;

use App\Models\KeuanganModel;
use App\Models\RTModel;
use App\Models\WargaModel;
use App\Traits\PendudukTrait;
use App\Traits\RtTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{
    use PendudukTrait;
    use RtTrait;

    protected $active = 'keuangan';

    public function index(Request $request)
    {
        $active = $this->active;

        $rt = $this->checkRT();

        $keuangan = KeuanganModel::where('rt_id', $rt)->paginate(5);

        if ($request->ajax()) {
            $keuangan = KeuanganModel::where('rt_id', $request->rt)
            ->where('keterangan_keuangan', 'like', "%$request->search%")
            ->paginate(5);

            return view('keuangan.child', compact('keuangan'))->render();
        }

        $totalPemasukan = KeuanganModel::where('jenis_keuangan', 'Pemasukkan')->sum('nominal');
        $totalPengeluaran = KeuanganModel::where('jenis_keuangan', 'Pengeluaran')->sum('nominal');
        $totalKas = $totalPemasukan - $totalPengeluaran;

        return view('keuangan.index', compact('active', 'rt', 'keuangan', 'totalPengeluaran', 'totalKas'));
    }

    public function create()
    {
        $active = $this->active;

        $rt = $this->checkRT();

        return view('keuangan.create', compact('active', 'rt'));
    }

    public function store(Request $request) {
        $request->validate([
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'rt_id' => 'required',
            'jenis_keuangan' => 'required',
            'keterangan_keuangan' => 'required',
        ], [
            'tanggal.required' => 'Format tanggal tidak valid',
            'bulan.required' => 'Format tanggal tidak valid',
            'tahun.required' => 'Format tanggal tidak valid',
            'rt_id.required' => 'Mohon memilih nomor rt',
            'jenis_keuangan.required' => 'Mohon memilih jenis keuangan',
            'keterangan_keuangan.required' => 'Mohon mengisi keterangan keuangan',
        ]);

        DB::beginTransaction();
        try {
            KeuanganModel::create([
                'tanggal' => $this->convertTTL($request->tanggal, $request->bulan, $request->tahun),
                'jenis_keuangan' => $request->jenis_keuangan,
                'nominal' => $request->nominal,
                'keterangan_keuangan' => $request->keterangan_keuangan,
                'rt_id' => $request->rt_id
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors('Gagal menambahkan transaksi, coba lagi.');
        }

        return redirect()
            ->route('keuangan')
            ->with('success', 'Berhasil menambahkan ' . $request->jenis_keuangan . ' RT 0' . $request->rt_id);
    }
}
