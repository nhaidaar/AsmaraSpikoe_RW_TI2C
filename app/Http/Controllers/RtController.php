<?php

namespace App\Http\Controllers;

use App\Models\RTModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RtController extends Controller
{
    protected $active = 'rt';

    public function index()
    {
        $user = Auth::user();

        if ($user) {
            return view('layout.maintenance', [
                'active' => $this->active,
            ]);
        }

        $rt = RTModel::with('ketuaRT')->get();

        return view('rt.index', [
            'active' => $this->active,
            'rt' => $rt
        ]);
    }
}
