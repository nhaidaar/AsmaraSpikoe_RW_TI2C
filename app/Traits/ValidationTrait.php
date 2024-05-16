<?php

namespace App\Traits;

use App\Models\WargaModel;

trait ValidationTrait
{
    public function validateWarga($nik, $tanggal)
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
}
