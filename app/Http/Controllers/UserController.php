<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\InCategory;
use App\Models\Novel;
use App\Models\Chapter;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function logIn(Request $request)
    {
        // dd($request);
        if (Auth::attempt(['email' => $request->email, 'password' =>
        $request->password])) {
            if(auth()->user()->role == 1){
                return redirect()->route('homeAdmin');
            }
            return redirect()->route('home');

        } else {
            echo("fail");
        }
    }

    public function logOut()
    {
       $user= Auth::logout();
       return redirect()->route('home');
    }

    public function viewLogin() {
        return view('auth.login');
    }

    public function member_wall($id) {
        $member = User::where('id', $id)->first();
        $category = Category::orderBy('id', 'DESC')->get();


        if(Auth::check()) {
            view()->share('nguoidung', Auth::user());
        }
        return view('pages.member.wall')->with(compact('member', 'category'));
    }
}
