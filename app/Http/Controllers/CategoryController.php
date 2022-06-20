<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Chapter;
use App\Models\Novel;
use App\Models\TypeNovel;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        return view('admin_cpanel.category.index')->with(compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_cpanel.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'categoryname' => 'required|unique:category|max:255',
                'slug_category' => 'required|unique:category|max:255',
                'status' => 'required',
            ],
            [
                'categoryname.unique' => 'Tên thể loại này đã có!',
                'slug_category.unique' => 'Slug thể loại này đã có!',
                'categoryname.required' => 'Phải có tên thể loại!',
                'slug_category.required' => 'Phải có slug thể loại!',
            ]
        );
        $category = new Category();
        $category->categoryname = $data['categoryname'];
        $category->slug_category = $data['slug_category'];
        $category->status = $data['status'];
        $category->save();
        return redirect()->back()->with('status', 'Thêm thể loại thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin_cpanel.category.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate(
            [
                'categoryname' => 'required|max:255',
                'slug_category' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'categoryname.required' => 'Phải có slug loại truyện!',
                'slug_category.required' => 'Phải có tên loại truyện!',
            ]
        );
        $category = Category::find($id);
        $category->categoryname = $data['categoryname'];
        $category->slug_category = $data['slug_category'];
        $category->status = $data['status'];
        $category->save();
        return redirect()->back()->with('status', 'Cập nhật thể loại thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa thể loại thành công!');
    }
}
