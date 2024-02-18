<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // =Halaman LOGIN=
    public function v_login()
    {
        return view("layouts.login");
    }
    // =============

    // Logic LOGIN
    public function login(Request $request)
    {
        $data = [
            "email" => $request->email,
            "password" => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect('/');
        } else {
            return redirect()->back();
        }
    }
    // =============

    // Halaman Register
    public function v_register()
    {
        return view("layouts.register");
    }
    // =============

    // Logic Register
    public function register(Request $request)
    {
        $request->validate([

            'username' => 'required',
            'email' => 'required|email',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'password' => 'required|min:6'
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->alamat = $request->alamat;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/masuk');
    }
    // =============
    // LogOut
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
