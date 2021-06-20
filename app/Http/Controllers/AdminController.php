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

    public function login(Request $request){
        $loginInfo = [
            'email' =>$request->email,
            'password' =>$request->password,
        ];
        $remember = $request->has('remember_me') ? true :false;

        if(Auth::attempt($loginInfo,$remember)){
            return redirect()->to('/home');
        }
    }
}

    
