<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeNovel;

class TypeNovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typenovel = TypeNovel::orderBy('id', 'DESC')->get();
        return view('admin_cpanel.typenovel.index')->with(compact('typenovel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_cpanel.typenovel.create');
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
                'typename' => 'required|unique:type|max:255',
                'slug_typename' => 'required|unique:type|max:255',
                'status' => 'required',
            ],
            [
                'typename.unique' => 'Tên loại truyện này đã có!',
                'slug_typename.unique' => 'Slug loại truyện này đã có!',
                'typename.required' => 'Phải có tên loại truyện!',
                'slug_typename.required' => 'Phải có slug loại truyện!',
            ]
        );
        $typenovel = new TypeNovel();
        $typenovel->typename = $data['typename'];
        $typenovel->slug_typename = $data['slug_typename'];
        $typenovel->status = $data['status'];
        $typenovel->save();
        return redirect()->back()->with('status', 'Thêm loại truyện thành công!');
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
        $type = TypeNovel::find($id);
        return view('admin_cpanel.typenovel.edit')->with(compact('type'));
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
                'typename' => 'required|max:255',
                'slug_typename' => 'required|max:255',
                'status' => 'required',
            ],
            [
                'typename.required' => 'Phải có slug loại truyện!',
                'slug_typename.required' => 'Phải có tên loại truyện!',
            ]
        );
        $typenovel = TypeNovel::find($id);
        $typenovel->typename = $data['typename'];
        $typenovel->slug_typename = $data['slug_typename'];
        $typenovel->status = $data['status'];
        $typenovel->save();
        return redirect()->back()->with('status', 'Cập nhật loại truyện thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TypeNovel::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa loại truyện thành công!');
    }
}
