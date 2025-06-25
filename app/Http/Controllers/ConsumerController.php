<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumerController extends Controller
{
    //
        public function index() {
        // nanti rubah pake template sama dashboard user
        return view('user.index');
    }

    public function dashboard() {
        // nanti rubah pake template sama dashboard user
        return view('user.index');
    }
}
