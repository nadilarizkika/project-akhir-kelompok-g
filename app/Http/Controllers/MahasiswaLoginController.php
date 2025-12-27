<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MahasiswaLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */
    public function showLogin()
    {
        return view('mahasiswa.login');
    }

   public function login(Request $request)
{
    $request->validate([
        'nim' => 'required',
        'password' => 'required'
    ]);

    if (Auth::attempt([
        'nim' => $request->nim,
        'password' => $request->password
    ])) {
        $request->session()->regenerate();

        // 🔥 LOGIKA CERDAS DI SINI
        return redirect()->intended(route('mahasiswa.dashboard'));
    }

    return back()->withErrors([
        'nim' => 'NIM atau password salah',
    ])->withInput();
}


    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */
    public function showRegister()
    {
        return view('mahasiswa.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'nim'      => 'required|string|unique:users,nim',
            'email'    => 'nullable|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'nim'      => $request->nim,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

         return redirect()->route('mahasiswa.login')->with('success', 'Registrasi berhasil! Silahkan login.');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

         return redirect('/');
    }
}
