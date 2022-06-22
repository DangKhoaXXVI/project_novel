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

    // public function signUp(Request $request)  {
    //     $checkEmail = User::where('email', $request->email);
    //     if(empty($checkEmail)) {
    //         $account = new User(); 
    //         $account->name = $request->name;
    //         $account->email = $request->email;
    //         if(empty($request->avatar)) {
    //             $account->avatar = 'avatar.jpg';
    //         } else {
    //             $file->storeAs('uploads/user', $request->avatar);
    //             $account->avatar = $request->avatar;
    //         }
    //         $account->password = $request->password;
    //         $account->save();

    //         if (Auth::attempt(['email' => $request->email, 'password' =>
    //         $request->password])) {
    //             return redirect()->route('home');
    //         } else {
    //             echo ("fail");
    //         }
    //     }
    // }

    public function ViewsignUp(Request $request)  {
        return view('auth.register');
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
        $novel_uploaded = Novel::where('user_id', $id)->get();

        if(Auth::check()) {
            view()->share('nguoidung', Auth::user());
        }
        return view('pages.member.wall')->with(compact('member', 'category', 'novel_uploaded'));
    }


    public function update(Request $request, $id) {

        $data = $request->validate(
            [
                'name' => 'required|max:255',
                'birthday' => 'max:255',
                'favorite' => 'max:255',
                'about' => 'max:255',
                'cover' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:width=1110, height=300',
            ],
            [
                'name.required' => 'Phải có tên thành viên truyện!',
                'cover.image' => 'Phải là file ảnh!',
                'cover.dimensions' => 'Ảnh bìa phải có kích thước là 1110 x 300!',
            ]
        );

        $member = User::find($id);
        $member->name = $data['name'];
        $member->birthday = $data['birthday'];
        $member->favorite = $data['favorite'];
        $member->about = $data['about'];


        $get_image = $request->avatar;
        if($get_image) {
            $path = 'uploads/user/'.$member->avatar;
            if(file_exists($path)) {
                if($path != 'uploads/user/default.png') {
                    unlink($path);
                }
            }
            $path = 'uploads/user/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.'-'.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $member->avatar = $new_image;
        }

        $get_cover = $request->cover;
        if($get_cover) {
            $path = 'uploads/user/'.$member->cover;
            if(file_exists($path)) {
                if($path != 'uploads/user/cover-default.jpg') {
                    unlink($path);
                }
            }
            $path = 'uploads/user/';
            $get_name_cover = $get_cover->getClientOriginalName();
            $name_cover = current(explode('.',$get_name_cover));
            $new_cover = $name_cover.'-'.rand(0,99).'.'.$get_cover->getClientOriginalExtension();
            $get_cover->move($path, $new_cover);
            $member->cover = $new_cover;
        }



        $member->save();
        return redirect()->back()->with('status', 'Cập nhật thông tin thành công!');
    }


    public function index()
    {
        $user = User::orderBy('id', 'DESC')->get();
        return view('admin_cpanel.user.index')->with(compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin_cpanel.user.edit')->with(compact('user'));
    }

    public function admin_update(Request $request, $id) {
        $data = $request->validate(
            [
                'role' => 'required',
            ],
        );

        $member = User::find($id);
        $member->role = $data['role'];

        $member->save();
        return redirect()->back()->with('status', 'Cập nhật thành viên thành công!');
    }

    public function destroy($id)
    {
        $user = User::find($id)->destroy();
        return redirect()->back()->with('status', 'Xóa thành viên thành công!');
    }

}
