<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index(){
        return view('login',[
            "title" => "Admin Login",
        ]);
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard/');
        }

        return back()->with('error','Username/Password salah');
    }

    public function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect('/login');
    }
}
