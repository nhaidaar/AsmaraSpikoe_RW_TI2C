<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeuanganController extends Controller
{
    protected $active = 'keuangan';

    public function index()
    {
        $user = Auth::user();

        if ($user) {
            return view('layout.maintenance', [
                'active' => $this->active,
            ]);
        }
    }
}
