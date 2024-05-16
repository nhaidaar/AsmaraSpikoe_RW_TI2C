<?php

namespace App\Http\Controllers;

use App\Models\PekerjaanModel;
use App\Models\RTModel;
use App\Models\SuratModel;
use App\Models\WargaModel;
use App\Traits\ValidationTrait;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

Carbon::setLocale('id');

class PersuratanController extends Controller
{
    use ValidationTrait;

    protected $active = 'persuratan';

    public function index()
    {
        return view('persuratan.index', [
            'active' => $this->active,
        ]);
    }

    public function proses(Request $request)
    {
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

        if ($request->jenis == 'sp') {
            $request->validate([
                'tujuan' => 'required'
            ], [
                'tujuan.required' => 'Tujuan pengajuan tidak valid'
            ]);
        }

        $validationError = $this->validateWarga($request->nik, $request->all());

        if ($validationError) {
            return back()->withErrors($validationError);
        }

        $warga = WargaModel::where('nik', $request->nik)->first();
        $pekerjaan = PekerjaanModel::find($warga->pekerjaan);
        $rt = RTModel::whereHas(
            'kartuKeluarga.detailKK.anggotaKeluarga',
            function ($query) use ($warga) {
                $query->where('warga_id', $warga->warga_id);
            }
        )->first();
        $tanggal = now();

        $word = new TemplateProcessor('templates/' . $request->jenis . '.docx');

        DB::beginTransaction();

        try {
            $countSurat = SuratModel::count();
            $surat = SuratModel::create([
                'surat_pengaju' => $warga->warga_id,
                'surat_jenis' => $request->jenis == 'sp' ? 'Surat Pengantar' : 'Surat Keterangan Tidak Mampu',
                'surat_tujuan' => $request->tujuan,
                'surat_tanggal' => $tanggal
            ]);

            $word->setValues(array(
                'rt_id' => str_pad($rt->rt_id, 2, '0', STR_PAD_LEFT),
                'surat_id' => str_pad($countSurat, 3, '0', STR_PAD_LEFT),
                'bulan' => date('m', strtotime($tanggal)),
                'tahun' => date('Y', strtotime($tanggal)),
                'nama_warga' => $warga->nama_warga,
                'tempat_lahir' => $warga->tempat_lahir,
                'tanggal_lahir' => Carbon::parse($warga->tanggal_lahir)->translatedFormat('j F Y'),
                'jenis_kelamin' => $warga->jenis_kelamin,
                'agama' => $warga->agama,
                'status_perkawinan' => $warga->status_perkawinan,
                'pekerjaan' => $pekerjaan->pekerjaan_nama,
                'alamat_domisili' => $warga->alamat_domisili,
                'created_at' => Carbon::parse($warga->created_at)->translatedFormat('j F Y'),
                'surat_tujuan' => $request->tujuan,
                'tanggal' => Carbon::parse($tanggal)->translatedFormat('j F Y'),
            ));

            $namaSurat = $surat->getKey() . '.docx';
            $word->saveAs('surat/' . $namaSurat);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors('Gagal membuat surat, coba lagi');
        }

        return view('persuratan.detail', [
            'active' => $this->active,
            'url' => 'surat/' . $namaSurat,
            'admin' => $rt->no_telepon,
        ]);
    }
}
