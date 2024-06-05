<?php

namespace App\Traits;

use App\Models\WargaModel;
use DateTime;
use Illuminate\Support\Facades\Validator;

trait PendudukTrait
{
    public function convertTTL($tanggal, $bulan, $tahun)
    {
        return $tahun . '-' . str_pad($bulan, 2, '0', STR_PAD_LEFT) . '-' . str_pad($tanggal, 2, '0', STR_PAD_LEFT);
    }

    public function calculateAge($dateOfBirth)
    {
        $dob = new DateTime($dateOfBirth);
        $now = new DateTime();
        $age = $now->diff($dob);
        return $age->y;
    }

    public function censoredNIK($number)
    {
        $firstFour = substr($number, 0, 4);
        $lastFour = substr($number, -4);

        return $firstFour . 'xxxxxxxx' . $lastFour;
    }

    public function matchNIKwithBirth($nik, $tanggal)
    {
        $findNik = WargaModel::where('nik', $nik)->first();

        if (!$findNik) {
            return 'NIK yang anda masukkan salah';
        }

        $tanggalLahir = $this->convertTTL($tanggal['tanggal'], $tanggal['bulan'], $tanggal['tahun']);

        if ($findNik->tanggal_lahir != $tanggalLahir) {
            return 'Tanggal lahir tidak valid';
        }

        return null; // No validation error
    }

    public function validateKK($request, $isUpdate)
    {
        $rules = [
            'no_kk' => 'required|min:16',
            'rt_id' => 'required'
        ];

        $messages = [
            'no_kk.required' => 'Mohon mengisi nomor KK',
            'no_kk.min' => 'Format nomor KK tidak sesuai',
            'rt_id.required' => 'Mohon mengisi RT domisili'
        ];

        if (!$isUpdate) {
            $rules += [
                'imageKK' => 'required|image|max:1024',
            ];

            $messages += [
                'imageKK.required' => 'Mohon melampirkan foto KK',
                'imageKK.max' => 'Ukuran foto KK maks. 1 MB',
            ];
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function validateWarga($request, $isUpdate)
    {
        $rules = [
            'nik' => 'required|min:16',
            'nama_warga' => 'required',
            'hubungan_id' => 'required',
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
            'status_warga' => 'required',
            'pendapatan' => 'required',
            'jumlah_kendaraan' => 'required',
            'bpjs' => 'required',
        ];

        $messages = [
            'nik.required' => 'Mohon mengisi NIK',
            'nik.min' => 'Format NIK tidak sesuai',
            'nama_warga.required' => 'Mohon mengisi nama warga',
            'hubungan_id.required' => 'Mohon mengisi status dalam keluarga',
            'tempat_lahir.required' => 'Mohon mengisi tempat lahir',
            'tanggal.required' => 'Format tanggal lahir tidak sesuai',
            'bulan.required' => 'Format tanggal lahir tidak sesuai',
            'tahun.required' => 'Format tanggal lahir tidak sesuai',
            'jenis_kelamin.required' => 'Mohon memilih jenis kelamin',
            'alamat_ktp.required' => 'Mohon mengisi alamat KTP',
            'alamat_domisili.required' => 'Mohon mengisi alamat domisili',
            'agama.required' => 'Mohon memilih agama',
            'status_perkawinan.required' => 'Mohon mengisi status perkawinan',
            'pekerjaan.required' => 'Mohon mengisi pekerjaan',
            'status_warga.required' => 'Mohon mengisi status warga',
            'pendapatan.required' => 'Mohon mengisi seluruh detail tambahan',
            'jumlah_kendaraan.required' => 'Mohon mengisi seluruh detail tambahan',
            'bpjs.required' => 'Mohon mengisi seluruh detail tambahan'
        ];

        $tanggal_lahir = $this->convertTTL($request->tanggal, $request->bulan, $request->tahun);
        $age = $this->calculateAge($tanggal_lahir);

        if (!$isUpdate && ($age >= 17)) {
            $rules += [
                'imageKTP' => 'required|image|max:1024',
            ];

            $messages += [
                'imageKTP.required' => 'Mohon melampirkan foto KTP',
                'imageKTP.max' => 'Ukuran foto KTP maks. 1 MB',
            ];
        }

        if ($request->hubungan_id == 1) {
            $rules += [
                'luas_rumah' => 'required',
                'jumlah_tanggungan' => 'required',
                'pbb' => 'required',
                'tagihan_listrik' => 'required',
                'tagihan_air' => 'required',
                'tanggungan_pendidikan' => 'required',
            ];

            $messages += [
                'luas_rumah.required' => 'Mohon mengisi seluruh detail tambahan',
                'jumlah_tanggungan.required' => 'Mohon mengisi seluruh detail tambahan',
                'pbb.required' => 'Mohon mengisi seluruh detail tambahan',
                'tagihan_listrik.required' => 'Mohon mengisi seluruh detail tambahan',
                'tagihan_air.required' => 'Mohon mengisi seluruh detail tambahan',
                'tanggungan_pendidikan.required' => 'Mohon mengisi seluruh detail tambahan',
            ];
        }

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }
    }
}
