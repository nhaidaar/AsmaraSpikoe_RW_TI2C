<?php

namespace App\Http\Controllers;

use App\Models\DetailWargaModel;
use App\Models\PenerimaBansosModel;
use App\Models\RTModel;
use App\Models\WargaModel;
use App\Traits\RtTrait;
use Illuminate\Http\Request;
use App\Traits\ValidationTrait;
use Illuminate\Support\Facades\Auth;

class BansosController extends Controller
{
    use ValidationTrait;
    use RtTrait;

    protected $active = 'bansos';

    public function index()
    {
        $active = $this->active;

        if (Auth::check()) {
            return redirect()->route('indexPenerimaBansos');
        }

        return view('bansos.index', compact('active'));
    }

    public function proses(Request $request)
    {
        $active = $this->active;

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
            return back()
                ->withInput()
                ->withErrors($validationError);
        }

        $warga = WargaModel::where('nik', $request->nik)->first();

        $bansos = PenerimaBansosModel::with([
            'bansos',
            'kriteriaPenerima.pendaftarBansos.detailWarga'
        ])
            ->whereHas('kriteriaPenerima.pendaftarBansos.detailWarga', function ($q) use ($warga) {
                $q->where('warga_id', $warga->warga_id);
            })
            ->get();

        $admin = RTModel::where('ketua_rt', $warga->warga_id)
            ->pluck('no_telepon')
            ->first();

        return view('bansos.detail', compact('active', 'warga', 'bansos', 'admin'));
    }

    public function index_penerima(Request $request)
    {
        $active = $this->active;

        $cardActive = 'penerima';

        $rt = $this->checkRT();

        $warga = DetailWargaModel::with([
            'warga.detailKK.kartuKeluarga',
            'pendaftarBansos.kriteriaPenerima.penerimaBansos.bansos'
        ])
            ->whereHas('pendaftarBansos.kriteriaPenerima.penerimaBansos')
            ->whereHas('warga.detailKK.kartuKeluarga', function ($q) use ($rt) {
                $q->where('rt', $rt);
            })
            ->paginate(5);

        if ($request->ajax()) {
            $warga = DetailWargaModel::with([
                'warga.detailKK.kartuKeluarga',
                'pendaftarBansos.kriteriaPenerima.penerimaBansos.bansos'
            ])
                ->whereHas('pendaftarBansos.kriteriaPenerima.penerimaBansos')
                ->whereHas('warga', function ($q) use ($request) {
                    $q->where('nama_warga', 'like', "%$request->search%");
                })
                ->whereHas('warga.detailKK.kartuKeluarga', function ($q) use ($request) {
                    $q->where('rt', $request->rt);
                })
                ->paginate(5);

            return view('bansos.penerima.child', compact('warga'))->render();
        }

        return view('bansos.penerima.index', compact('active', 'cardActive', 'rt', 'warga'));
    }

    public function index_penghitungan()
    {
        $active = $this->active;

        $cardActive = 'penghitungan';

        $rt = $this->checkRT();

        return view('bansos.penghitungan.index', compact('active', 'cardActive', 'rt'));
    }

    public function create()
    {
        $active = $this->active;

        $rt = $this->checkRT();

        return view('bansos.penghitungan.create', compact('active', 'rt'));
    }

    public function show()
    {
        $active = $this->active;

        $rt = $this->checkRT();

        return view('bansos.penghitungan.show', compact('active', 'rt'));
    }
}
