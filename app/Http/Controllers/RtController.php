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
        $rw = UserModel::with('warga')->where('level', 'rt')->first();
        $rt = RTModel::with('ketuaRT')->get();

        return view('rt.index', [
            'active' => $this->active,
            'rw' => $rw,
            'rt' => $rt
        ]);
    }
}
