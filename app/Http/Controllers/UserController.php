<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        return view('Auth.login');
    }
    public function loginSubmit(Request $request)
    {
        $name_email = $request->input('name_email');
        $password = $request->input('password');
        if(Auth::attempt(['name'=>$name_email,'password'=>$password])
        || Auth::attempt(['email'=>$name_email,'password'=>$password])){
            if(Auth::user()->is_admin==1){
                return redirect('/')->with('success','Login Success');
            }else{
                return redirect('/user')->with('success','Login Success');
            }
        }else{
            return redirect('/login')->with('error','Login Failed');
        }
    }
    public function signup(){
        return view('Auth.singUp');
    }
    public function signupSubmit(Request $request){
        $input=$request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $input['password']=Hash::make($input['password']);
        $insert=User::create($input);
        return redirect('/login');
    }
    public function logout(){
        Auth::logout();
        return redirect('/login')->with('success','Logout Success');
    }

}

