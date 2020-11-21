<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
//my default controller for base

class DefaultController extends Controller
{
    public function index(){

        return view('backend.default.index');
    }
    public function login(){
        return view('backend.default.login');   
    }

    public function authentication(Request $request){
        $request->flash();
        $credentials = $request -> only('email', 'password');
        $remember_me = $request -> has('remember_me') ? true : false;
        if(Auth::attempt($credentials, $remember_me)){
            return redirect()->intended(route('ninja.index'));
        }return back()->with('error', 'Hatalı giriş..');
    }

    public function logout(){
        Auth::logout();
        return redirect(route('ninja.login'))->with('success', 'Çıkış başarılı..');
    }
}
