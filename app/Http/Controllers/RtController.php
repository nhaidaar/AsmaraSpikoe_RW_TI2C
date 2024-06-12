<?php

namespace App\Http\Controllers;

use App\Models\RTModel;
use App\Models\UserModel;
use App\Models\WargaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RtController extends Controller
{
    protected $active = 'rt';

    public function index()
    {
        $active = $this->active;

        $rw = UserModel::with('warga')->where('level', 'rw')->first();

        $rt = RTModel::with('ketuaRT')->get();

        return view('rt.index', compact('active', 'rw', 'rt'));
    }

    public function edit($id)
    {
        $active = $this->active;

        if (Auth::user()->level != 'rw') {
            return redirect()
                ->route('rt')
                ->withErrors('Anda tidak diperkenankan mengakses halaman ini');
        }

        $rt = RTModel::with('ketuaRT')->find($id);

        return view('rt.edit', compact('active', 'rt'));
    }

    public function store(Request $request, string $id)
    {
        $request->validate([
            'ketua_rt' => 'required',
            'no_telepon' => 'required|numeric'
        ]);

        $warga = WargaModel::where('nik', $request->ketua_rt)->first();

        if (!$warga) {
            return back()
                ->withInput()
                ->withErrors('NIK tidak ditemukan!');
        }

        DB::beginTransaction();

        try {
            RTModel::find($id)->update([
                'ketua_rt' => $warga->warga_id,
                'no_telepon' => $request->no_telepon
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()
                ->withInput()
                ->withErrors('Gagal mengubah RT, coba lagi' . $th);
        }

        return redirect()
            ->route('rt')
            ->with('success', 'Berhasil mengubah data RT');
    }
}
