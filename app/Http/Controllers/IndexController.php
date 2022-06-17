<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\InCategory;
use App\Models\Novel;
use App\Models\Chapter;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function home() {
        $category = Category::orderBy('id', 'DESC')->get();
        $novel = Novel::orderBy('id', 'DESC')->where('status', 0)->take(13)->get();
        $top8_novel = Novel::orderBy('novel_views', 'DESC')->where('status', 0)->take(8)->get();
        $completed_novel = Novel::orderBy('id', 'DESC')->where('status', 0)->where('state', 1)->take(6)->get();
        return view('pages.home')->with(compact('category', 'novel', 'top8_novel', 'completed_novel'));
    }

    public function category($slug) {
        $category = Category::orderBy('id', 'DESC')->get();
        $category_id = Category::where('slug_category', $slug)->first();
        // $incategory = InCategory::orderBy('id', 'DESC')->where('category_id', $category_id->id)->get();
        $novel = Novel::orderBy('id', 'DESC')->where('status', 0)->where('category_id', $category_id->id)->get();
        return view('pages.category')->with(compact('category', 'novel'));
    }

    public function novel($slug) {
        $category = Category::orderBy('id', 'DESC')->get();
        $novel = Novel::with('typenovel')->where('slug_novelname', $slug)->where('status', 0)->first();
        $novel->novel_views = $novel->novel_views + 1;
        $novel->save();
        $chapter = Chapter::with('novel')->orderBy('id', 'ASC')->where('novel_id', $novel->id)->get();
        return view('pages.novel')->with(compact('category', 'novel', 'chapter'));
    }

    public function chapter($slug) {
        $category = Category::orderBy('id', 'DESC')->get();
        $novel = Chapter::where('slug_chapter', $slug)->first();
        $chapter = Chapter::with('novel')->where('slug_chapter', $slug)->where('novel_id', $novel->novel_id)->first();
        $all_chapter = Chapter::with('novel')->orderBy('id', 'ASC')->where('novel_id', $novel->novel_id)->get();
        $next_chapter = Chapter::where('novel_id', $novel->novel_id)->where('id', '>', $chapter->id)->min('slug_chapter');
        $previous_chapter = Chapter::where('novel_id', $novel->novel_id)->where('id', '<', $chapter->id)->max('slug_chapter');
        $max_id = Chapter::where('novel_id', $novel->novel_id)->orderBy('id', 'DESC')->first();
        $min_id = Chapter::where('novel_id', $novel->novel_id)->orderBy('id', 'ASC')->first();
        return view('pages.chapter')->with(compact('category','chapter', 'all_chapter', 'next_chapter', 'previous_chapter', 'max_id', 'min_id'));
    }
}
