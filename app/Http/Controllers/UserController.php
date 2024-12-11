<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    //

    public function loginform(){
        return view('user.login');
    }

    public function register(){
        return view('user.register');
    }

    public function home(){
        return view('home');
    }

    public function makeuser(Request $request){
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|',
        ]);
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::attempt($request->only('email', 'password'));

        return redirect()->route('home');
    
    }
    public function login(Request $request){
     
        $user = $request->validate(
            ['email'=>'required|min:2',
            'password'=>'required|min:6'            
            ]
        ); 
       
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
           }
          else{
            return back()->withErrors([
                'failed' => 'Incorrect login credentials!'
               ]);
          }
        }

        public function logout(){
            Auth::logout();
            return redirect()->route('login')->with('success', 'Logged out successfully.');
        }
}
