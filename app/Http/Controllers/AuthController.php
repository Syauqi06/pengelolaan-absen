<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Tampilkan halaman login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $pengguna = DB::table('penggunas')
            ->where('username', $request->username) 
            ->first(); // Ambil data pengguna berdasarkan username

        if (!$pengguna) {
            return back()->withErrors(['username' => 'Username tidak ditemukan.']);
        }

        if (!Hash::check($request->password, $pengguna->password_hash)) {
            return back()->withErrors(['password' => 'Password salah.']);
        }

        if ($pengguna->status_aktif !== 'aktif') {
            return back()->withErrors(['status' => 'Akun tidak aktif.']);
        }

        // Simpan ke session
        $request->session()->put('login', true); // Simpan login ke session
        $request->session()->put('id_pengguna', $pengguna->id_pengguna); // Simpan id_pengguna ke session
        $request->session()->put('role_id', $pengguna->role_id); // Simpan role_id ke session
        $request->session()->put('username', $pengguna->username); // Simpan username ke session

        // Catat log aktivitas (login)
        DB::table('log_aktivitas')->insert([
            'id_pengguna' => $pengguna->id_pengguna,
            'jenis_aktivitas' => 'login',
            'waktu_aktivitas' => now(),
        ]);

        // Arahkan sesuai role
        switch ($pengguna->role_id) {
            case 1:
                return redirect()->route('admin.dashboard');
            case 2:
                return redirect()->route('guru.dashboard');
            case 3:
                return redirect()->route('murid.dashboard');
            default:
                return redirect()->route('login')->withErrors(['role' => 'Role tidak dikenali.']);
        }
    }

    // Proses logout
    public function logout(Request $request)
    {
        $id = $request->session()->get('id_pengguna'); // ambil id_pengguna dari session

        // Catat log logout
        DB::table('log_aktivitas')->insert([
            'id_pengguna' => $id,
            'jenis_aktivitas' => 'logout',
            'waktu_aktivitas' => now(),
        ]);

        $request->session()->flush(); // hapus semua session
        return redirect()->route('login')->with('success', 'Berhasil logout.');
    }
}