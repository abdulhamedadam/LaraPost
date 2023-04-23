<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){

       //validation
       //store user
       //redirect
      $this->validate($request,[
        'name'=>'required|max:255',
        'username'=>'required|max:255',
        'email'=>'required|email|max:255',
        'password'=>'required|confirmed',

      ]);

      User::create([
        'name'=>$request->name,
        'usrename'=>$request->username,
        'email'=>$request->email,
        'password'=>Hash::make($request->password),
      ]);

           auth()->attempt($request->only('email','password'));

           return redirect('/dashboard');
    }
}