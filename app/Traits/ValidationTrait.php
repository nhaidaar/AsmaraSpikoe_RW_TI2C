<?php

namespace App\Traits;

use App\Models\WargaModel;
use Illuminate\Support\Facades\Validator;

trait ValidationTrait
{
    public function matchNIKwithBirth($nik, $tanggal)
    {
        $findNik = WargaModel::where('nik', $nik)->first();

        if (!$findNik) {
            return 'NIK yang anda masukkan salah';
        }

        $tanggalLahir = $tanggal['tahun'] . '-' . str_pad($tanggal['bulan'], 2, '0', STR_PAD_LEFT) . '-' . str_pad($tanggal['tanggal'], 2, '0', STR_PAD_LEFT);

        if ($findNik->tanggal_lahir != $tanggalLahir) {
            return 'Tanggal lahir tidak valid';
        }

        return null; // No validation error
    }

    public function validateKK($request)
    {
        $rules = [
            'imageKK' => 'required',
            'no_kk' => 'required|min:16',
        ];

        $messages = [
            'imageKK.required' => 'Mohon melampirkan foto KK',
            'no_kk.required' => 'Format nomor KK tidak sesuai',
            'no_kk.min' => 'Format nomor KK tidak sesuai',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    }

    public function validateUpdateKK($request)
    {
        $rules = [
            'no_kk' => 'required|min:16',
        ];

        $messages = [
            'no_kk.required' => 'Format nomor KK tidak valid',
            'no_kk.min' => 'Format nomor KK tidak valid',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    }

    public function validateKepalaKeluarga($request)
    {
        $rules = [
            'imageKTP' => 'required',
            'nama' => 'required',
            'nik' => 'required|min:16',
            'tempat_lahir' => 'required',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'jenis_kelamin' => 'required',
            'alamat_ktp' => 'required',
            'alamat_domisili' => 'required',
            'rt_id' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
        ];

        $messages = [
            'imageKTP.required' => 'Mohon melampirkan foto KTP',
            'nama.required' => 'Mohon mengisi nama kepala keluarga',
            'nik.required' => 'Format NIK tidak sesuai',
            'nik.min' => 'Format NIK tidak sesuai',
            'tempat_lahir.required' => 'Mohon mengisi tempat lahir kepala keluarga',
            'tanggal.required' => 'Format tanggal lahir tidak sesuai',
            'bulan.required' => 'Format tanggal lahir tidak sesuai',
            'tahun.required' => 'Format tanggal lahir tidak sesuai',
            'jenis_kelamin.required' => 'Mohon memilih jenis kelamin kepala keluarga',
            'alamat_ktp.required' => 'Mohon mengisi alamat KTP kepala keluarga',
            'alamat_domisili.required' => 'Mohon mengisi alamat domisili kepala keluarga',
            'rt_id.required' => 'Mohon memilih nomor rt kepala keluarga',
            'agama.required' => 'Mohon memilih agama kepala keluarga',
            'status_perkawinan.required' => 'Mohon memilih status perkawinan kepala keluarga',
            'pekerjaan.required' => 'Mohon memilih pekerjaan kepala keluarga',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    }

    public function validateDetailTambahan($request)
    {
        $rules = [
            'pendapatan' => 'required',
            'jumlah_kendaraan' => 'required',
            'bpjs' => 'required',
            'luas_bangunan' => 'required',
            'jumlah_tanggungan' => 'required',
            'pbb' => 'required',
            'tagihan_listrik' => 'required',
            'tagihan_air' => 'required',
            'tanggungan_pendidikan' => 'required',
        ];

        $messages = [
            'pendapatan.required' => 'Mohon mengisi seluruh detail tambahan',
            'jumlah_kendaraan.required' => 'Mohon mengisi seluruh detail tambahan',
            'bpjs.required' => 'Mohon mengisi seluruh detail tambahan',
            'luas_bangunan.required' => 'Mohon mengisi seluruh detail tambahan',
            'jumlah_tanggungan.required' => 'Mohon mengisi seluruh detail tambahan',
            'pbb.required' => 'Mohon mengisi seluruh detail tambahan',
            'tagihan_listrik.required' => 'Mohon mengisi seluruh detail tambahan',
            'tagihan_air.required' => 'Mohon mengisi seluruh detail tambahan',
            'tanggungan_pendidikan.required' => 'Mohon mengisi seluruh detail tambahan',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    }

    public function validateWarga($request)
    {
        $rules = [
            'imageKTP' => 'required',
            'nama' => 'required',
            'nik' => 'required|min:16',
            'hubungan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'jenis_kelamin' => 'required',
            'alamat_ktp' => 'required',
            'alamat_domisili' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'pendapatan' => 'required',
            'jumlah_kendaraan' => 'required',
            'bpjs' => 'required',
        ];

        $messages = [
            'imageKTP.required' => 'Mohon melampirkan foto KTP',
            'nama.required' => 'Mohon mengisi nama warga',
            'nik.required' => 'Format NIK tidak sesuai',
            'nik.min' => 'Format NIK tidak sesuai',
            'hubungan.required' => 'Mohon mengisi status warga dalam keluarga',
            'tempat_lahir.required' => 'Mohon mengisi tempat lahir warga',
            'tanggal.required' => 'Format tanggal lahir tidak sesuai',
            'bulan.required' => 'Format tanggal lahir tidak sesuai',
            'tahun.required' => 'Format tanggal lahir tidak sesuai',
            'jenis_kelamin.required' => 'Mohon memilih jenis kelamin warga',
            'alamat_ktp.required' => 'Mohon mengisi alamat KTP warga',
            'alamat_domisili.required' => 'Mohon mengisi alamat domisili warga',
            'agama.required' => 'Mohon memilih agama warga',
            'status_perkawinan.required' => 'Mohon mengisi status perkawinan warga',
            'pekerjaan.required' => 'Mohon mengisi pekerjaan warga',
            'pendapatan.required' => 'Mohon mengisi seluruh detail tambahan',
            'jumlah_kendaraan.required' => 'Mohon mengisi seluruh detail tambahan',
            'bpjs.required' => 'Mohon mengisi seluruh detail tambahan'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    }

    public function validateUpdateWarga($request)
    {
        $rules = [
            // 'imageKTP' => 'required',
            'nama' => 'required',
            'nik' => 'required|min:16',
            'hubungan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
            'jenis_kelamin' => 'required',
            'alamat_ktp' => 'required',
            'alamat_domisili' => 'required',
            'agama' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required',
            'pendapatan' => 'required',
            'jumlah_kendaraan' => 'required',
            'bpjs' => 'required',
        ];

        $messages = [
            // 'imageKTP.required' => 'Mohon melampirkan foto KTP',
            'nama.required' => 'Mohon mengisi nama warga',
            'nik.required' => 'Format NIK tidak sesuai',
            'nik.min' => 'Format NIK tidak sesuai',
            'hubungan.required' => 'Mohon mengisi status warga dalam keluarga',
            'tempat_lahir.required' => 'Mohon mengisi tempat lahir warga',
            'tanggal.required' => 'Format tanggal lahir tidak sesuai',
            'bulan.required' => 'Format tanggal lahir tidak sesuai',
            'tahun.required' => 'Format tanggal lahir tidak sesuai',
            'jenis_kelamin.required' => 'Mohon memilih jenis kelamin warga',
            'alamat_ktp.required' => 'Mohon mengisi alamat KTP warga',
            'alamat_domisili.required' => 'Mohon mengisi alamat domisili warga',
            'agama.required' => 'Mohon memilih agama warga',
            'status_perkawinan.required' => 'Mohon mengisi status perkawinan warga',
            'pekerjaan.required' => 'Mohon mengisi pekerjaan warga',
            'pendapatan.required' => 'Mohon mengisi seluruh detail tambahan',
            'jumlah_kendaraan.required' => 'Mohon mengisi seluruh detail tambahan',
            'bpjs.required' => 'Mohon mengisi seluruh detail tambahan'
        ];

        if ($request->hubungan == 1) {
            $rules += [
                'luas_bangunan' => 'required',
                'jumlah_tanggungan' => 'required',
                'pbb' => 'required',
                'tagihan_listrik' => 'required',
                'tagihan_air' => 'required',
                'tanggungan_pendidikan' => 'required',
            ];

            $messages += [
                'luas_bangunan.required' => 'Mohon mengisi seluruh detail tambahan',
                'jumlah_tanggungan.required' => 'Mohon mengisi seluruh detail tambahan',
                'pbb.required' => 'Mohon mengisi seluruh detail tambahan',
                'tagihan_listrik.required' => 'Mohon mengisi seluruh detail tambahan',
                'tagihan_air.required' => 'Mohon mengisi seluruh detail tambahan',
                'tanggungan_pendidikan.required' => 'Mohon mengisi seluruh detail tambahan',
            ];
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
    }
}
