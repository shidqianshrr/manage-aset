<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $register = new User();
        $register->name = $request->name;
        $register->email = $request->email;
        $register->password = bcrypt($request->password);
        $register->role = 'users';
        $register->remember_token = Str::random(10);

        $register->save();
        return redirect('login');
    }

    public function login(Request $request)
    {
    	
    	if(Auth::attempt($request->only('email','password'))){
    		if(Auth::user()->role =='manager'){
                
                return redirect('dashboard');
            } else if(Auth::user()->role =='admin'){
                
                return redirect('dashboard');
            }else {
              
              return redirect('dashboard');
            }
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
