<?php

namespace App\Http\Controllers;

use App\Models\KKModel;
use App\Models\PekerjaanModel;
use App\Models\RTModel;
use App\Models\SuratModel;
use App\Models\WargaModel;
use App\Traits\RtTrait;
use App\Traits\ValidationTrait;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

Carbon::setLocale('id');

class PersuratanController extends Controller
{
    use RtTrait;
    use ValidationTrait;

    protected $active = 'persuratan';

    public function index(Request $request)
    {
        $active = $this->active;

        if (!Auth::check()) {
            return view('persuratan.index', compact('active'));
        }

        $rt = $this->checkRT();

        $surat = SuratModel::with(['pengajuSurat.detailKK.kartuKeluarga'])
            ->whereHas('pengajuSurat.detailKK.kartuKeluarga', function ($q) use ($rt) {
                $q->where('rt', $rt);
            })
            ->orderBy('surat_tanggal', 'DESC')
            ->paginate(5);

        if ($request->ajax()) {
            $surat = SuratModel::with(['pengajuSurat.detailKK.kartuKeluarga'])
                ->whereHas('pengajuSurat', function ($q) use ($request) {
                    $q->where('nama_warga', $request->search);
                })
                ->whereHas('pengajuSurat.detailKK.kartuKeluarga', function ($q) use ($request) {
                    $q->where('rt', $request->rt);
                })
                ->orderBy('surat_tanggal', 'DESC')
                ->paginate(5);

            return view('persuratan.child', compact('surat'))->render();
        }

        return view('persuratan.riwayat', compact('active', 'rt', 'surat'));
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

        $validationError = $this->matchNIKwithBirth($request->nik, $request->all());

        if ($validationError) {
            return back()
                ->withInput()
                ->withErrors($validationError);
        }

        $warga = WargaModel::where('nik', $request->nik)->first();

        $no_kk = KKModel::whereHas(['detailKK.anggotaKeluarga'], function ($q) use ($warga) {
            $q->where('warga_id', $warga->warga_id);
        })
            ->pluck('no_kk')
            ->first();

        $pekerjaan = PekerjaanModel::find($warga->pekerjaan);
        $rt = RTModel::whereHas(
            'kartuKeluarga.detailKK.anggotaKeluarga',
            function ($q) use ($warga) {
                $q->where('warga_id', $warga->warga_id);
            }
        )->first();
        $tanggal = now();

        $word = new TemplateProcessor('templates/' . $request->jenis . '.docx');

        DB::beginTransaction();

        try {
            $countSurat = SuratModel::count();
            $surat = SuratModel::create([
                'surat_pengaju' => $warga->warga_id,
                'surat_jenis' => $request->jenis == 'sp' ? 'Surat Pengantar' : 'Surat Pernyataan Tidak Mampu',
                'surat_tujuan' => $request->jenis == 'sp' ? $request->tujuan : 'Pengajuan Bantuan Sosial',
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

                'no_kk' => $no_kk,
                'nik' => $request->nik
            ));

            $namaSurat = $surat->getKey() . '.docx';
            $word->saveAs('surat/' . $namaSurat);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors('Gagal membuat surat, coba lagi')->withInput();
        }

        return view('persuratan.download', [
            'active' => $this->active,
            'url' => 'surat/' . $namaSurat,
            'admin' => $rt->no_telepon,
        ]);
    }
}
