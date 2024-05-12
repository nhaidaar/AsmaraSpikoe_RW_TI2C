<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RtController extends Controller
{
    protected $active = 'rt';

    public function index()
    {
        return view('rt.index', [
            'active' => $this->active,
        ]);
    }
}
