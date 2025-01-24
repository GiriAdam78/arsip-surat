<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect('dashboard');
        }else{
            return view('auth.login');
        }
    }
    public function actionlogin(Request $request){
        $data = [
            'email'     => $request->input('email'),
            'password'  => $request->input('password')
        ];

        if(Auth::attempt($data)){
            return redirect('dashboard');
        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/login');
        }
    }

    public function actionLogout(){
        Auth::logout();
        return redirect('/');
    }
}
