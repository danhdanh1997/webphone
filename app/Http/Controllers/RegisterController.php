<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\customer;
use Hash;
class RegisterController extends Controller
{
    public function getregister()
    {
        return view('backend.register');
    }

    public function postregister(Request $req)
    {
        $check = [
            'name'=>'required|max:50',
            'email'=>'required|max:50|email',
            'password'=>'required|min:6|max:20',
            'confirm_password'=>'required|same:password',
        ];
        $mess = [
            'name.required'=>'Vui lòng nhập họ tên',
            'name.max'=>'Họ tên không quá :max kí tự',
            'password.min'=>'Password ít nhất :min kí tự'
        ];
        $validator = Validator::make($req->all(),$check,$mess);
        if($validator->fails()) {
            return redirect()
                        ->route('register')
                        ->withErrors($validator)
                        ->withInput();
        }
       
        $user = new customer();
        $user->name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->phone=$req->phone;
        $user->adress=$req->adress;
        $user->age=$req->age;
        $user->save();
        return redirect()->back()->with('message','Tao tai khoan thanh cong');
    }
}
