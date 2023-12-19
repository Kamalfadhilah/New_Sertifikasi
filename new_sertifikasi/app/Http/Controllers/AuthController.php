<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $a)
    {
        try{
            $checkuser = User::where('email',$a->email)->first();
            
            if($checkuser){
                return redirect()->back()->with('warning', 'Email Telah Terdaftar!');
            }

            User::create([
                'name' => $a->nama,
                'email' => $a->email,
                'password' => Hash::make($a->password),
                'is_admin' => 'n',
                'created_at' => now()
            ]);

            return redirect('/')->with('success', 'Berhasil Register!');
        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Data Tidak Tersimpan!');
        }
    }

    public function login(Request $request)
    {   try{
            $request->validate([
                'email' => 'required',
                'password' => 'required',
            ]);

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                // Jika autentikasi berhasil
                return redirect('/pendaftaran/show_pendaftaran');
            } else {
                // Jika autentikasi gagal
                return back()->withInput()->with('warning', 'Email atau password salah');
            }
        }catch (\Exception $e){
            return redirect()->back()->with('error', 'Data Tidak Tersimpan!');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
