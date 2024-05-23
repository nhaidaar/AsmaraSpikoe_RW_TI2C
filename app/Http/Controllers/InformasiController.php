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
        $pengumumanList = PengumumanModel::orderBy('pengumuman_id', 'DESC')->take(4)->get();
        $kegiatanList = KegiatanModel::orderBy('kegiatan_id', 'ASC')->where('tanggal_waktu', '>=', now())->get();

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

    public function create_pengumuman()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('informasi');
        }

        return view('informasi.create_pengumuman', ['active' => $this->active]);
    }

    public function store_pengumuman(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('index');
        }

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

            return back()->withErrors('Gagal membuat pengumuman, coba lagi');
        }

        return redirect()->route('informasi');
    }

    public function edit_pengumuman($id)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('informasi');
        }

        $pengumuman = PengumumanModel::find($id);

        return view('informasi.edit_pengumuman', [
            'active' => $this->active,
            'pengumuman' => $pengumuman
        ]);
    }

    public function update_pengumuman(Request $request, string $id)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('index');
        }

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

            return back()->withErrors('Gagal mengedit pengumuman, coba lagi');
        }

        return redirect()->route('informasi');
    }

    public function create_kegiatan()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('informasi');
        }

        return view('informasi.create_kegiatan', ['active' => $this->active]);
    }

    public function store_kegiatan(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('index');
        }

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

            return back()->withErrors('Gagal membuat informasi kegiatan, coba lagi');
        }

        return redirect()->route('informasi');
    }

    public function edit_kegiatan($id)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('informasi');
        }

        $kegiatan = KegiatanModel::find($id);

        return view('informasi.edit_kegiatan', [
            'active' => $this->active,
            'kegiatan' => $kegiatan
        ]);
    }

    public function update_kegiatan(Request $request, string $id)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('index');
        }

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

            return back()->withErrors('Gagal membuat informasi kegiatan, coba lagi');
        }

        return redirect()->route('informasi');
    }
}
