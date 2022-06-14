<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logIn(Request $request)
    {
        // dd($request);
        if (Auth::attempt(['email' => $request->email, 'password' =>
        $request->password])) {
            if(auth()->user()->role == 1){
                echo('login with admin');
                return redirect()->route('homeAdmin');
            }
            echo('login with user');
            return redirect()->route('home');

        } else {
            echo("fail");
        }
    }

    public function logOut()
    {
       $user= Auth::logout();
       return redirect()->route('log-in');
    }

    public function viewLogin() {
        return view('auth.login');
    }
}
