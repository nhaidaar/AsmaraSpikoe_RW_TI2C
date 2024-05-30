<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            return redirect()->route('penduduk');
        }

        return view('index', [
            'active' => 'Informasi'
        ]);
    }
}
