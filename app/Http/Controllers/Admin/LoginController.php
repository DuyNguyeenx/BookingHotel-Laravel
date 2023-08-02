<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        if($request->isMethod('POST')) {
            if(Auth::attempt(['email' => $request->email,'password' =>$request->password])) {
                return redirect()->route('dashboard');
            } else{
                Session::flash('error','Sai mật khẩu hoặc email');
                return redirect()->route('login');
            }
        }
        return view('admin.auth.login');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

}
