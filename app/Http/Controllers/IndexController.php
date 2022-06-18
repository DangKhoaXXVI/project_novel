<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\InCategory;
use App\Models\Novel;
use App\Models\Chapter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    // function checkLogin() {
    //     if(Auth::check()) {
    //         view()->share('nguoidung', Auth::user());
    //     }
    // }


    public function home() {
        $category = Category::orderBy('id', 'DESC')->get();
        $novel = Novel::orderBy('id', 'DESC')->where('status', 0)->take(13)->get();
        $top8_novel = Novel::orderBy('novel_views', 'DESC')->where('status', 0)->take(8)->get();
        $completed_novel = Novel::orderBy('id', 'DESC')->where('status', 0)->where('state', 1)->take(6)->get();

        if(Auth::check()) {
            view()->share('nguoidung', Auth::user());
        }
        return view('pages.home')->with(compact('category', 'novel', 'top8_novel', 'completed_novel'));
    }

    public function category($slug) {
        $category = Category::orderBy('id', 'DESC')->get();
        $category_id = Category::where('slug_category', $slug)->first();

        // Nhiều Thể Loại
        $incategories = InCategory::where('category_id', $category_id->id)->get();
        $many_categories = [];
        foreach($incategories as $key => $nov) {
            $many_categories[] = $nov->novel_id;
        }
        

        $novel = Novel::orderBy('id', 'DESC')->where('status', 0)->whereIn('id', $many_categories)->get();

        if(Auth::check()) {
            view()->share('nguoidung', Auth::user());
        }
        return view('pages.category')->with(compact('category', 'novel', 'category_id', 'incategories', 'many_categories'));
    }

    public function novel($slug) {
        $category = Category::orderBy('id', 'DESC')->get();
        $novel = Novel::with('typenovel')->where('slug_novelname', $slug)->where('status', 0)->first();
        $novel->novel_views = $novel->novel_views + 1;
        $novel->save();
        $chapter = Chapter::with('novel')->orderBy('id', 'ASC')->where('novel_id', $novel->id)->get();
        $user = User::with('novel')->where('id', $novel->user_id)->first();

        if(Auth::check()) {
            view()->share('nguoidung', Auth::user());
        }
        return view('pages.novel')->with(compact('category', 'novel', 'chapter', 'user'));
    }

    public function chapter($id, $slug) {
        $category = Category::orderBy('id', 'DESC')->get();
        $novel = Chapter::where('slug_chapter', $slug)->where('id', $id)->first();
        $chapter = Chapter::with('novel')->where('slug_chapter', $slug)->where('novel_id', $novel->novel_id)->first();

        $all_chapter = Chapter::with('novel')->orderBy('id', 'ASC')->where('novel_id', $novel->novel_id)->get();
        $next_chapter = Chapter::where('novel_id', $novel->novel_id)->where('id', '>', $chapter->id)->min('slug_chapter');
        $next_chapter_id = Chapter::where('novel_id', $novel->novel_id)->where('id', '>', $chapter->id)->min('id');
        $previous_chapter = Chapter::where('novel_id', $novel->novel_id)->where('id', '<', $chapter->id)->max('slug_chapter');
        $previous_chapter_id = Chapter::where('novel_id', $novel->novel_id)->where('id', '<', $chapter->id)->max('id');
        $max_id = Chapter::where('novel_id', $novel->novel_id)->orderBy('id', 'DESC')->first();
        $min_id = Chapter::where('novel_id', $novel->novel_id)->orderBy('id', 'ASC')->first();

        if(Auth::check()) {
            view()->share('nguoidung', Auth::user());
        }
        return view('pages.chapter')->with(compact('category','chapter', 'all_chapter', 'next_chapter', 'previous_chapter', 'max_id', 'min_id', 'next_chapter_id', 'previous_chapter_id'));
    }
}
