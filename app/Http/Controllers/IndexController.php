<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Novel;
use App\Models\Chapter;

class IndexController extends Controller
{
    public function home() {
        $category = Category::orderBy('id', 'DESC')->get();
        $novel = Novel::orderBy('id', 'DESC')->where('status', 0)->get();
        return view('pages.home')->with(compact('category', 'novel'));
    }

    public function category($slug) {
        $category = Category::orderBy('id', 'DESC')->get();
        $category_id = Category::where('slug_category', $slug)->first();
        $novel = Novel::orderBy('id', 'DESC')->where('status', 0)->where('category_id', $category_id->id)->get();
        return view('pages.category')->with(compact('category', 'novel'));
    }

    public function novel($slug) {
        $category = Category::orderBy('id', 'DESC')->get();
        $novel = Novel::with('typenovel')->where('slug_novelname', $slug)->where('status', 0)->first();
        $chapter = Chapter::with('novel')->orderBy('id', 'DESC')->where('novel_id', $novel->id)->get();
        return view('pages.novel')->with(compact('category', 'novel', 'chapter'));
    }
}
