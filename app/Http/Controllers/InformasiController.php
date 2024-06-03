<?php

namespace App\Http\Controllers;

use App\Models\KegiatanModel;
use App\Models\PengumumanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class InformasiController extends Controller
{
    protected $active = 'informasi';

    public function index()
    {
        $active = $this->active;

        $pengumuman = PengumumanModel::with('user.warga')
            ->orderBy('pengumuman_id', 'DESC')
            ->take(4)
            ->get();

        $kegiatan = KegiatanModel::orderBy('kegiatan_id', 'ASC')
            ->where('tanggal_waktu', '>=', now())
            ->get();

        return view('informasi.index', compact('active', 'pengumuman', 'kegiatan'));
    }

    public function detail($id)
    {
        $active = $this->active;

        $pengumuman = PengumumanModel::with('user.warga')->find($id);

        if (!$pengumuman) {
            return redirect()
                ->route('informasi')
                ->withErrors('Pengumuman yang dicari tidak ditemukan');
        }

        return view('informasi.detail', compact('active', 'pengumuman'));
    }

    public function create_pengumuman()
    {
        $active = $this->active;

        return view('informasi.create_pengumuman', compact('active'));
    }

    public function store_pengumuman(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'jam' => 'required',
            'menit' => 'required',
            'tempat' => 'required'
        ], [
            'judul.required' => 'Format judul tidak sesuai',
            'tanggal.required' => 'Format tanggal tidak sesuai',
            'bulan.required' => 'Format tanggal tidak sesuai',
            'tahun.required' => 'Format tanggal tidak sesuai',
            'jam.required' => 'Format waktu tidak sesuai',
            'menit.required' => 'Format waktu tidak sesuai',
            'tempat.required' => 'Format tempat tidak sesuai'
        ]);

        $user = Auth::user();
        $tanggal = $request->tahun . '-' . str_pad($request->bulan, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->tanggal, 2, '0', STR_PAD_LEFT);
        $waktu = $request->jam . ':' . $request->menit . ':00';

        DB::beginTransaction();

        try {
            $pengumuman = PengumumanModel::create([
                'pengumuman_nama' => $request->judul,
                'pengumuman_lokasi' => $request->tempat,
                'pengumuman_detail' => $request->deskripsi,
                'tanggal_waktu' => $tanggal . ' ' . $waktu,
                'user_id' => $user->user_id
            ]);

            if ($request->image != null) {
                $nama = $pengumuman->getKey() . ".png";
                $request->image->move('img/pengumuman', $nama);
            } else {
                // Select random image from template
                $randomImage = random_int(1, 4) . ".png";
                // Copy and rename to pengumuman id
                File::copy(public_path('img/pengumuman/' . $randomImage), public_path('img/pengumuman/' . $pengumuman->getKey() . '.png'));
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors('Gagal membuat pengumuman, coba lagi');
        }

        return redirect()
            ->route('informasi')
            ->with('success', 'Berhasil menambahkan pengumuman');
    }

    public function edit_pengumuman($id)
    {
        $active = $this->active;

        $pengumuman = PengumumanModel::find($id);

        return view('informasi.edit_pengumuman', compact('active', 'pengumuman'));
    }

    public function update_pengumuman(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'jam' => 'required',
            'menit' => 'required',
            'tempat' => 'required'
        ], [
            'judul.required' => 'Format judul tidak sesuai',
            'tanggal.required' => 'Format tanggal tidak sesuai',
            'bulan.required' => 'Format tanggal tidak sesuai',
            'tahun.required' => 'Format tanggal tidak sesuai',
            'jam.required' => 'Format waktu tidak sesuai',
            'menit.required' => 'Format waktu tidak sesuai',
            'tempat.required' => 'Format tempat tidak sesuai'
        ]);

        $user = Auth::user();
        $tanggal = $request->tahun . '-' . str_pad($request->bulan, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->tanggal, 2, '0', STR_PAD_LEFT);
        $waktu = $request->jam . ':' . $request->menit . ':00';

        DB::beginTransaction();

        try {
            PengumumanModel::find($id)->update([
                'pengumuman_nama' => $request->judul,
                'pengumuman_lokasi' => $request->tempat,
                'pengumuman_detail' => $request->deskripsi,
                'tanggal_waktu' => $tanggal . ' ' . $waktu,
                'user_id' => $user->user_id
            ]);

            if ($request->image != null) {
                $nama = $id . '.png';
                $request->image->move('img/pengumuman', $nama);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors('Gagal mengedit pengumuman, coba lagi');
        }

        return redirect()
            ->route('informasi')
            ->with('success', 'Berhasil mengubah pengumuman');
    }

    public function delete_pengumuman($id)
    {
        DB::beginTransaction();
        try {
            PengumumanModel::destroy($id);

            File::delete('img/pengumuman/' . $id . '.png');

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors('Gagal menghapus pengumuman, coba lagi');
        }

        return redirect()
            ->route('informasi')
            ->with('success', 'Berhasil menghapus pengumuman');
    }

    public function create_kegiatan()
    {
        $active = $this->active;

        return view('informasi.create_kegiatan', compact('active'));
    }

    public function store_kegiatan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'jam' => 'required',
            'menit' => 'required',
            'tempat' => 'required'
        ], [
            'nama.required' => 'Format nama tidak sesuai',
            'tanggal.required' => 'Format tanggal tidak sesuai',
            'bulan.required' => 'Format tanggal tidak sesuai',
            'tahun.required' => 'Format tanggal tidak sesuai',
            'jam.required' => 'Format waktu tidak sesuai',
            'menit.required' => 'Format waktu tidak sesuai',
            'tempat.required' => 'Format tempat tidak sesuai'
        ]);

        $user = Auth::user();
        $tanggal = $request->tahun . '-' . str_pad($request->bulan, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->tanggal, 2, '0', STR_PAD_LEFT);
        $waktu = $request->jam . ':' . $request->menit . ':00';

        DB::beginTransaction();

        try {
            KegiatanModel::create([
                'kegiatan_nama' => $request->nama,
                'kegiatan_lokasi' => $request->tempat,
                'tanggal_waktu' => $tanggal . ' ' . $waktu,
                'user_id' => $user->user_id
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors('Gagal membuat informasi kegiatan, coba lagi');
        }

        return redirect()
            ->route('informasi')
            ->with('success', 'Berhasil menambahkan informasi kegiatan');
    }

    public function edit_kegiatan($id)
    {
        $active = $this->active;

        $kegiatan = KegiatanModel::find($id);

        return view('informasi.edit_kegiatan', compact('active', 'kegiatan'));
    }

    public function update_kegiatan(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'jam' => 'required',
            'menit' => 'required',
            'tempat' => 'required'
        ], [
            'nama.required' => 'Format nama tidak sesuai',
            'tanggal.required' => 'Format tanggal tidak sesuai',
            'bulan.required' => 'Format tanggal tidak sesuai',
            'tahun.required' => 'Format tanggal tidak sesuai',
            'jam.required' => 'Format waktu tidak sesuai',
            'menit.required' => 'Format waktu tidak sesuai',
            'tempat.required' => 'Format tempat tidak sesuai'
        ]);

        $user = Auth::user();
        $tanggal = $request->tahun . '-' . str_pad($request->bulan, 2, '0', STR_PAD_LEFT) . '-' . str_pad($request->tanggal, 2, '0', STR_PAD_LEFT);
        $waktu = $request->jam . ':' . $request->menit . ':00';

        DB::beginTransaction();

        try {
            KegiatanModel::find($id)->update([
                'kegiatan_nama' => $request->nama,
                'kegiatan_lokasi' => $request->tempat,
                'tanggal_waktu' => $tanggal . ' ' . $waktu,
                'user_id' => $user->user_id
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors('Gagal membuat informasi kegiatan, coba lagi');
        }

        return redirect()
            ->route('informasi')
            ->with('success', 'Berhasil mengubah informasi kegiatan');
    }

    public function delete_kegiatan($id)
    {
        DB::beginTransaction();
        try {
            KegiatanModel::destroy($id);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors('Gagal menghapus informasi kegiatan, coba lagi');
        }

        return redirect()
            ->route('informasi')
            ->with('success', 'Berhasil menghapus informasi kegiatan');
    }
}
