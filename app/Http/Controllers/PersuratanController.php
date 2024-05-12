<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersuratanController extends Controller
{
    protected $active = 'persuratan';

    public function index()
    {
        return view('persuratan.index', [
            'active' => $this->active,
        ]);
    }
}
