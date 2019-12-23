<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function getlogin()
    {
        return view('backend.login');
    }

    public function postlogin(Request $req)
    {
        $arr=['email'=>$req->email,'password'=>$req->password];
        if($req->remember='Remember Me')
        {
            $remember=true;
        }
        else
        {
            $remember=false;
        }
        if(Auth::attempt($arr,$remember))
        {
           
           return redirect()->intended('home');
        }
        else
        {
            return back()->withInput()->with('error','tai khoang hoac mat khau chua dung');
        }
    }
}
