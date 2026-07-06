<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credential = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credential)) {

            $request->session()->regenerate();

            if (Auth::user()->role == 'dosen') {
                return redirect()->route('dashboard.dosen');
            }

            return redirect()->route('dashboard.mahasiswa');
        }

        return back()->with('error', 'Email atau Password salah.');
    }

    /*
    |--------------------------------------------------------------------------
    | Register
    |--------------------------------------------------------------------------
    */

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([

            'name' => 'required|max:100',

            'email' => 'required|email|unique:users,email',

            'role' => 'required|in:dosen,mahasiswa',

            'password' => 'required|min:6|confirmed',

        ]);

        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'role' => $request->role,

            'password' => Hash::make($request->password),

        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }

    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}