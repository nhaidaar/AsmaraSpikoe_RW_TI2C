<?php

namespace App\Traits;

trait KeuanganTrait
{
    function formatRupiah($number)
    {
        $formattedNumber = number_format($number, 0, ',', '.');
        return 'Rp ' . $formattedNumber;
    }
}
