<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ADminController extends Controller
{
    public function login(){
        if(auth()->check()){
            return redirect()->to('home');
        }
        return view('login');
    }
     
    public function postlogin(Request $request){
        $remember=$request->has('remember') ? true:false;
        if(auth()->attempt([
            'email'=> $request->email,
            'password'=> $request->pass
        ],$remember)){
            Session::flash('success', 'Đăng  thành viên thành công!');
            return redirect()->to('home');
        }
        else {
            Session::flash('error', 'Email hoặc mật khẩu không đúng!');
			return view('login');
        }
    }
}
