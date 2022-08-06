<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view('login.login');
    }

    public function authenticate(Request $request)
    {
        // dd($request);
        $credential = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt($credential)){
            $request->session()->regenerate();
            return redirect()->intended('/sampah');
        }else{
            
        }
        return redirect('/login')->with('loginError', 'Login Gagal!');

        
    }

    public function register(){
        return view('login.register');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = DB::table('users')->where('email', $request->email)->first();


        if ($email){
            return redirect('/register')->with('emailExist','Email Sudah Terdaftar!');
        }else{

            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'password'=> Hash::make($request->password)
            ]);
            return redirect('/login')->with('register','Daftar Berhasil!');
        }

        
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
