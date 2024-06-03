<?php

namespace App\Traits;

use App\Models\WargaModel;
use Illuminate\Support\Facades\Validator;

trait ValidationTrait
{
    use PendudukTrait;

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
}
