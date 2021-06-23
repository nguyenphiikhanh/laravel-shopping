<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('login');
    }

    public function login(Request $request)
    {
        // dd(bcrypt($request->password));
        $loginInfo = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        $remember = $request->has('remember_me') ? true : false;

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $remember)) {
            return redirect()->to('home');
        } else {
            echo '<script> alert("Sai email hoặc mật khẩu,vui lòng thử lại");</script>';
            return view('login');
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