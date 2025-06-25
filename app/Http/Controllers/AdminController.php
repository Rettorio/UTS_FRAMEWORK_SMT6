<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        // nanti rubah pake template sama dashboard admin
        return view('admin.index');
    }

    public function dashboard() {
        // nanti rubah pake template sama dashboard admin
        return view('admin.index');
    }
}
