<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyelenggaraController extends Controller
{
    //
    public function index() {
        // nanti rubah pake template sama dashboard penyelenggara
        return view('penyelenggara.index');
    }

    public function dashboard() {
        // nanti rubah pake template sama dashboard admin
        return view('penyelenggara.index');
    }
}
