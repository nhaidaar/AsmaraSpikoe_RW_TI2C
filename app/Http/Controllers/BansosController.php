<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BansosController extends Controller
{
    protected $active = 'bansos';

    public function index()
    {
        return view('bansos.index', [
            'active' => $this->active,
        ]);
    }
}
