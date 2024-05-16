<?php

namespace App\Http\Controllers;

use App\Models\RTModel;
use Illuminate\Http\Request;

class RtController extends Controller
{
    protected $active = 'rt';

    public function index()
    {
        $rt = RTModel::with('ketuaRT')->get();

        return view('rt.index', [
            'active' => $this->active,
            'rt' => $rt
        ]);
    }
}
