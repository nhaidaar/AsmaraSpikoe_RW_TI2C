<?php

namespace App\Http\Controllers;

use App\Models\RTModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RtController extends Controller
{
    protected $active = 'rt';

    public function index()
    {
        $active = $this->active;

        $rw = UserModel::with('warga')->where('level', 'rw')->first();

        $rt = RTModel::with('ketuaRT')->get();

        return view('rt.index', compact('active', 'rw', 'rt'));
    }
}
