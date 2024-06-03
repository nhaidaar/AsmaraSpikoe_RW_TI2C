<?php

namespace App\Http\Controllers;

use App\Models\DetailKKModel;
use App\Models\DetailWargaModel;
use App\Models\KKModel;
use App\Models\PekerjaanModel;
use App\Models\PenerimaBansosModel;
use App\Models\RTModel;
use App\Models\StatusHubunganModel;
use App\Models\UserModel;
use App\Models\WargaModel;
use App\Traits\PendudukTrait;
use App\Traits\RtTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PendudukController extends Controller
{
    use PendudukTrait;
    use RtTrait;

    protected $active = 'penduduk';

    public function index()
    {
        return redirect()->route('indexKeluarga');
    }

    public function index_keluarga(Request $request)
    {
        $active = $this->active;
        $cardActive = 'keluarga';

        $rt = $this->checkRT();

        $keluarga = KKModel::with(['detailKK.anggotaKeluarga'])
            ->whereHas('detailKK.anggotaKeluarga', function ($q) {
                $q->where('status_warga', 'Hidup');
            })
            ->where('rt', $rt)
            ->orderBy('no_kk')
            ->paginate(5);

        if ($request->ajax()) {
            $keluarga = KKModel::with(['detailKK.anggotaKeluarga'])
                ->whereHas('detailKK.anggotaKeluarga', function ($q) use ($request) {
                    $q->where('nama_warga', 'like', "%$request->search%");
                    $q->where('status_warga', 'Hidup');
                })
                ->where('rt', $request->rt)
                ->orderBy('no_kk')
                ->paginate(5);

            return view('penduduk.keluarga.child', compact('keluarga'))->render();
        }

        return view('penduduk.keluarga.index', compact('active', 'cardActive', 'rt', 'keluarga'));
    }

    public function show_keluarga($id)
    {
        $active = $this->active;

        $kk = KKModel::find($id);

        // Restrict other RT to check detail KK
        if (Auth::user()->level != 'rw') {
            $rt = $this->checkRT();

            if ($rt != $kk->rt) {
                return redirect()
                    ->route('indexKeluarga')
                    ->withErrors('Anda tidak diperkenankan melihat data tersebut');
            }
        }

        $anggota = WargaModel::with(['jenisPekerjaan', 'detailKK.statusHubungan'])
            ->whereHas('detailKK', function ($q) use ($id) {
                $q->where('kk_id', $id);
            })
            ->get()
            ->sortBy(function ($item) {
                return $item->detailKK->hubungan_id;
            });

        return view('penduduk.keluarga.show', compact('active', 'kk', 'anggota'));
    }

    public function create_keluarga()
    {
        $active = $this->active;

        $rt = $this->checkRT();

        $pekerjaan = PekerjaanModel::all();

        return view('penduduk.keluarga.create', compact('active', 'rt', 'pekerjaan'));
    }

    public function store_keluarga(Request $request)
    {
        if ($response = $this->validateKK($request, false)) {
            return $response;
        }

        $findKK = KKModel::where('no_kk', $request->no_kk)->first();
        if ($findKK) {
            return back()
                ->withInput()
                ->withErrors('Nomor KK telah terdaftar sebelumnya');
        }

        if ($request->jenis == 'oldKK') {
            $warga = WargaModel::where('nik', $request->oldNik)->first();

            if (!$warga) {
                return back()
                    ->withInput()
                    ->withErrors('NIK tidak ditemukan');
            }

            DB::beginTransaction();
            try {
                $kk = KKModel::create([
                    'no_kk' => $request->no_kk,
                    'rt' => $request->rt_id,
                ]);

                $namaKK = $request->no_kk . '.png';
                $request->imageKK->move('kk/', $namaKK);

                DetailKKModel::where('warga_id', $warga->warga_id)
                    ->first()
                    ->update([
                        'kk_id' => $kk->getKey(),
                        'hubungan_id' => 1
                    ]);

                DB::commit();
            } catch (\Throwable $th) {
                DB::rollBack();

                return back()
                    ->withInput()
                    ->withErrors('Gagal menambahkan KK, coba lagi.');
            }

            return redirect()
                ->route('indexKeluarga')
                ->with('success', 'Berhasil menambah data Keluarga ' . $warga->nama_warga);
        }

        if ($response = $this->validateWarga($request, false)) {
            return $response;
        }

        $tanggal_lahir = $this->convertTTL($request->tanggal, $request->bulan, $request->tahun);

        DB::beginTransaction();
        try {
            $kk = KKModel::create([
                'no_kk' => $request->no_kk,
                'rt' => $request->rt_id,
            ]);

            $namaKK = $request->no_kk . '.png';
            $request->imageKK->move('kk/', $namaKK);

            $kepalaKeluarga = WargaModel::create([
                'nik' => $request->nik,
                'nama_warga' => $request->nama_warga,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat_ktp' => $request->alamat_ktp,
                'alamat_domisili' => $request->alamat_domisili,
                'agama' => $request->agama,
                'status_perkawinan' => $request->status_perkawinan,
                'pekerjaan' => $request->pekerjaan,
                'status_warga' => $request->status_warga,
            ]);

            $namaKTP = $request->nik . '.png';
            $request->imageKTP->move('ktp/', $namaKTP);

            DetailKKModel::create([
                'kk_id' => $kk->getKey(),
                'warga_id' => $kepalaKeluarga->getKey(),
                'hubungan_id' => $request->hubungan_id,
            ]);

            DetailWargaModel::create([
                'warga_id' => $kepalaKeluarga->getKey(),
                'pendapatan' => $request->pendapatan,
                'luas_rumah' => $request->luas_rumah,
                'jumlah_tanggungan' => $request->jumlah_tanggungan,
                'tanggungan_pendidikan' => $request->tanggungan_pendidikan,
                'pbb' => $request->pbb,
                'tagihan_listrik' => $request->tagihan_listrik,
                'tagihan_air' => $request->tagihan_air,
                'bpjs' => $request->bpjs,
                'jumlah_kendaraan' => $request->jumlah_kendaraan,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors('Gagal menambahkan KK, coba lagi');
        }

        return redirect()
            ->route('indexKeluarga')
            ->with('success', 'Berhasil menambahkan data Keluarga ' . $request->nama_warga);
    }

    public function edit_keluarga($id)
    {
        $active = $this->active;

        $rt = $this->checkRT();

        $kk = KKModel::find($id);

        // Restrict other RT to edit KK
        if (Auth::user()->level != 'rw' && $rt != $kk->rt) {
            return redirect()
                ->route('indexKeluarga')
                ->withErrors('Anda tidak diperkenankan mengubah data tersebut');
        }

        $anggota = DetailKKModel::with(['anggotaKeluarga', 'statusHubungan'])
            ->where('kk_id', $id)
            ->whereHas('anggotaKeluarga', function ($q) {
                $q->where('status_warga', 'Hidup');
            })
            ->get();

        return view('penduduk.keluarga.edit', compact('active', 'rt', 'kk', 'anggota'));
    }

    public function update_keluarga(Request $request, string $id)
    {
        if ($response = $this->validateKK($request, true)) {
            return $response;
        }

        DB::beginTransaction();
        try {
            KKModel::find($id)->update([
                'no_kk' => $request->no_kk,
                'rt' => $request->rt_id
            ]);

            if ($request->imageKK != null) {
                $namaKK = $request->no_kk . '.png';
                $request->imageKK->move('kk/', $namaKK);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors('Gagal mengupdate data keluarga, coba lagi');
        }

        return redirect()
            ->route('indexKeluarga')
            ->with('success', 'Berhasil mengubah data Keluarga ');
    }

    public function delete_keluarga(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'reason' => 'required'
        ]);

        if ($validate->fails()) {
            return back()
                ->withInput()
                ->withErrors('Permintaan hapus data keluarga tidak valid');
        }

        DB::beginTransaction();
        try {
            $anggota = DetailKKModel::with(['anggotaKeluarga'])
                ->where('kk_id', $request->id)
                ->orderBy('hubungan_id')
                ->get();

            foreach ($anggota as $a) {
                WargaModel::find($a->warga_id)->update([
                    'status_warga' => $request->reason
                ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors('Gagal menghapus data keluarga, coba lagi');
        }

        return redirect()
            ->route('indexKeluarga')
            ->with('success', 'Berhasil menghapus data Keluarga ' . $anggota->first()->anggotaKeluarga->nama_warga);
    }

    public function index_warga(Request $request)
    {
        $active = $this->active;
        $cardActive = 'warga';

        $rt = $this->checkRT();

        $warga = WargaModel::with(['detailKK.kartuKeluarga'])
            ->whereHas('detailKK.kartuKeluarga', function ($q) use ($rt) {
                $q->where('rt', $rt);
            })
            ->where('status_warga', 'Hidup')
            ->orderBy('nama_warga')
            ->paginate(5);

        if ($request->ajax()) {
            $warga = WargaModel::with(['detailKK.kartuKeluarga'])
                ->whereHas('detailKK.kartuKeluarga', function ($q) use ($request) {
                    $q->where('rt', $request->rt);
                })
                ->where('nama_warga', 'like', "%$request->search%")
                ->where('status_warga', 'Hidup')
                ->orderBy('nama_warga')
                ->paginate(5);

            return view('penduduk.warga.child', compact('warga'))->render();
        }

        return view('penduduk.warga.index', compact('active', 'cardActive', 'rt', 'warga'));
    }

    public function show_warga($id)
    {
        $active = $this->active;

        $warga = WargaModel::with(['jenisPekerjaan', 'detailKK.statusHubungan', 'detailKK.kartuKeluarga'])->find($id);

        // Restrict other RT to check detail warga
        if (Auth::user()->level != 'rw') {
            $rt = $this->checkRT();

            if ($rt != $warga->detailKK->kartuKeluarga->rt) {
                return redirect()
                    ->route('indexWarga')
                    ->withErrors('Anda tidak diperkenankan melihat data tersebut');
            }
        }

        $detailWarga = DetailWargaModel::where('warga_id', $id)->first();

        return view('penduduk.warga.show', compact('active', 'warga', 'detailWarga'));
    }

    public function create_warga()
    {
        $active = $this->active;

        $pekerjaan = PekerjaanModel::all();

        $hubungan = StatusHubunganModel::all();

        return view('penduduk.warga.create', compact('active', 'pekerjaan', 'hubungan'));
    }

    public function store_warga(Request $request)
    {
        if ($response = $this->validateWarga($request, true)) {
            return $response;
        }

        $kk = KKModel::where('no_kk', $request->no_kk)->first();
        if (!$kk) {
            return back()
                ->withInput()
                ->withErrors('Nomor KK tidak ditemukan');
        }

        $findNik = WargaModel::where('nik', $request->nik)->first();
        if ($findNik) {
            return back()
                ->withInput()
                ->withErrors('NIK telah terdaftar sebelumnya');
        }

        $tanggal_lahir = $this->convertTTL($request->tanggal, $request->bulan, $request->tahun);

        DB::beginTransaction();
        try {
            $warga = WargaModel::create([
                'nik' => $request->nik,
                'nama_warga' => $request->nama_warga,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat_ktp' => $request->alamat_ktp,
                'alamat_domisili' => $request->alamat_domisili,
                'agama' => $request->agama,
                'status_perkawinan' => $request->status_perkawinan,
                'pekerjaan' => $request->pekerjaan,
            ]);

            $namaKTP = $request->nik . '.png';
            $request->imageKTP->move('ktp/', $namaKTP);

            DetailKKModel::create([
                'kk_id' => $kk->getKey(),
                'warga_id' => $warga->getKey(),
                'hubungan_id' => $request->hubungan_id,
            ]);

            $detailWarga = DetailWargaModel::create([
                'warga_id' => $warga->getKey(),
                'pendapatan' => $request->pendapatan,
                'bpjs' => $request->bpjs,
                'jumlah_kendaraan' => $request->jumlah_kendaraan
            ]);

            if ($request->hubungan_id == 1) {
                DetailWargaModel::find($detailWarga->getKey())
                    ->update([
                        'luas_rumah' => $request->luas_rumah,
                        'jumlah_tanggungan' => $request->jumlah_tanggungan,
                        'tanggungan_pendidikan' => $request->tanggungan_pendidikan,
                        'pbb' => $request->pbb,
                        'tagihan_listrik' => $request->tagihan_listrik,
                        'tagihan_air' => $request->tagihan_air,
                    ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors('Gagal menambahkan data warga, coba lagi');
        }

        return redirect()
            ->route('indexWarga')
            ->with('success', 'Berhasil menambahkan data ' . $request->nama_warga);
    }

    public function edit_warga($id)
    {
        $active = $this->active;

        $rt = $this->checkRT();

        $warga = WargaModel::with(['detailWarga', 'detailKK.kartuKeluarga'])->find($id);

        // Restrict other RT to edit warga
        if (Auth::user()->level != 'rw' && $rt != $warga->detailKK->kartuKeluarga->rt) {
            return redirect()
                ->route('indexWarga')
                ->withErrors('Anda tidak diperkenankan mengubah data tersebut');
        }

        $pekerjaan = PekerjaanModel::all();

        $hubungan = StatusHubunganModel::all();

        return view('penduduk.warga.edit', compact('active', 'warga', 'pekerjaan', 'hubungan'));
    }

    public function update_warga(Request $request, string $id)
    {
        if ($response = $this->validateWarga($request, true)) {
            return $response;
        }

        $kk = KKModel::where('no_kk', $request->no_kk)->first();
        if (!$kk) {
            return back()
                ->withInput()
                ->withErrors('Nomor KK tidak ditemukan');
        }

        $tanggal_lahir = $this->convertTTL($request->tanggal, $request->bulan, $request->tahun);

        DB::beginTransaction();
        try {
            if ($request->imageKTP != null) {
                $namaKTP = $request->nik . '.png';
                $request->imageKTP->move('ktp/', $namaKTP);
            }

            WargaModel::find($id)
                ->update([
                    'nik' => $request->nik,
                    'nama_warga' => $request->nama_warga,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat_ktp' => $request->alamat_ktp,
                    'alamat_domisili' => $request->alamat_domisili,
                    'agama' => $request->agama,
                    'status_perkawinan' => $request->status_perkawinan,
                    'pekerjaan' => $request->pekerjaan,
                ]);

            DetailKKModel::where('warga_id', $id)
                ->first()
                ->update([
                    'hubungan_id' => $request->hubungan_id,
                ]);

            DetailWargaModel::where('warga_id', $id)
                ->first()
                ->update([
                    'pendapatan' => $request->pendapatan,
                    'bpjs' => $request->bpjs,
                    'jumlah_kendaraan' => $request->jumlah_kendaraan
                ]);

            if ($request->hubungan_id == 1) {
                DetailWargaModel::where('warga_id', $id)
                    ->first()
                    ->update([
                        'luas_rumah' => $request->luas_rumah,
                        'jumlah_tanggungan' => $request->jumlah_tanggungan,
                        'tanggungan_pendidikan' => $request->tanggungan_pendidikan,
                        'pbb' => $request->pbb,
                        'tagihan_listrik' => $request->tagihan_listrik,
                        'tagihan_air' => $request->tagihan_air,
                    ]);
            }

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors('Gagal mengupdate data warga, coba lagi');
        }

        return redirect()
            ->route('indexWarga')
            ->with('success', 'Berhasil mengubah data ' . $request->nama_warga);
    }

    public function delete_warga(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'reason' => 'required'
        ]);

        if ($validate->fails()) {
            return back()
                ->withInput()
                ->withErrors('Permintaan hapus data warga tidak valid');
        }

        DB::beginTransaction();
        try {
            $warga = WargaModel::find($request->id);

            $warga->update([
                'status_warga' => $request->reason
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors('Gagal menghapus warga, coba lagi');
        }

        return redirect()
            ->route('indexWarga')
            ->with('success', 'Berhasil menghapus data ' . $warga->nama_warga);
    }

    public function index_inactive(Request $request)
    {
        $active = $this->active;
        $cardActive = 'inactive';

        $rt = $this->checkRT();

        $warga = WargaModel::with(['detailKK.kartuKeluarga'])
            ->whereHas('detailKK.kartuKeluarga', function ($q) use ($rt) {
                $q->where('rt', $rt);
            })
            ->where('status_warga', '!=', 'Hidup')
            ->orderBy('nama_warga')
            ->paginate(5);

        if ($request->ajax()) {
            $warga = WargaModel::with(['detailKK.kartuKeluarga'])
                ->whereHas('detailKK.kartuKeluarga', function ($q) use ($request) {
                    $q->where('rt', $request->rt);
                })
                ->where('nama_warga', 'like', "%$request->search%")
                ->where('status_warga', '!=', 'Hidup')
                ->orderBy('nama_warga')
                ->paginate(5);

            return view('penduduk.warga.child', compact('warga'))->render();
        }

        return view('penduduk.inactive.index', compact('active', 'cardActive', 'rt', 'warga'));
    }
}
