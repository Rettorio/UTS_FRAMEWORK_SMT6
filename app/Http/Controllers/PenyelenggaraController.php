<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenyelenggaraController extends Controller
{
    public function dashboard() {
        // nanti rubah pake template sama dashboard admin
        return view('penyelenggara.dashboard');
    }
}
