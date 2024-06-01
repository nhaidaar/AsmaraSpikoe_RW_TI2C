<?php

namespace App\Traits;

use App\Models\WargaModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

trait RtTrait
{
    public function checkRT()
    {
        $rt = 1; // Default

        if (Auth::check() && Auth::user()->level != 'rw') {
            $user = WargaModel::with('detailKK.kartuKeluarga')->find(Auth::user()->warga_id);
            $rt = $user->detailKK->kartuKeluarga->rt;
        }

        return $rt;
    }
}
