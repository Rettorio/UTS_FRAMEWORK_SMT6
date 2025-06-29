<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    // halaman register consumer/pembeli tiket
    public function showConsumerLoginForm()
    {
        return view('auth.consumer_login');
    }

    // halaman login admin
    public function showAdminLoginForm()
    {
        return view('auth.admin_login');
    }

    // halaman login penyelenggara / partner
    public function showPenyelenggaraLoginForm()
    {
        return view('auth.penyelenggara_login');
    }

    // universal login method pake method ini untuk login di semua role
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            $fallbackRouteName = 'consumer.index';

            switch ($user->role) {
                case User::$ROLE_ADMIN:
                    $fallbackRouteName = 'admin.index';
                    break;
                case User::$ROLE_PENYELENGGARA:
                    $fallbackRouteName = 'penyelenggara.dashboard';
                    break;
            }
            return redirect()->intended(route($fallbackRouteName));

        } else {
            return back()->withErrors('email atau password user salah')->withInput($request->only('email'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // Or redirect to your main login page: return redirect()->route('login');
    }
}
