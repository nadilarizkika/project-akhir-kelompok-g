<?php

namespace App\Http\Controllers;

use App\Models\Admin; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function showLogin()
{
    if (Auth::guard('admin')->check()) {
        return redirect()->route('admin.dashboard');
    }

    return view('admin.login');
}


    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah'])->withInput($request->only('email'));
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed', 
        ]);

        /** @var \App\Models\Admin $admin */
        $admin = Auth::guard('admin')->user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Password lama tidak sesuai']);
        }

        $admin->update(['password' => Hash::make($request->new_password)]); // Gunakan Hash::make
        return back()->with('success', 'Password berhasil diperbarui!');
    }

    public function showRegister() {
        // PERHATIKAN: Ubah ke 'admin.registar' jika nama file Anda masih ada huruf 'a' nya
        // Atau rename file Anda menjadi register.blade.php agar cocok dengan kode di bawah
        return view('admin.register'); 
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8|confirmed',
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // WAJIB menggunakan Hash::make
        ]);

        return redirect()->route('login.admin')->with('success', 'Registrasi berhasil! Silahkan login.');
    }
}