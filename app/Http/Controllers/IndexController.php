<?php

namespace App\Http\Controllers;

use App\Models\PengumumanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    protected $active = 'index';

    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('penduduk');
        }

        $active = $this->active;
        $pengumuman = PengumumanModel::orderBy('pengumuman_id', 'DESC')->take(4)->get();

        return view('index', compact('active', 'pengumuman'));
    }
}
