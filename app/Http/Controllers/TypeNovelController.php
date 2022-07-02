<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeNovel;

class TypeNovelController extends Controller
{

    // public function index()
    // {
    //     $typenovel = TypeNovel::orderBy('id', 'DESC')->get();
    //     return view('admin_cpanel.typenovel.index')->with(compact('typenovel'));
    // }

    // public function create()
    // {
    //     return view('admin_cpanel.typenovel.create');
    // }

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
        return redirect()->route('typenovel_index')->with('status', 'Thêm loại truyện thành công!');
    }

    

    // public function edit($id)
    // {
    //     $type = TypeNovel::find($id);
    //     return view('admin_cpanel.typenovel.edit')->with(compact('type'));
    // }

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
        return redirect()->route('typenovel_index')->with('status', 'Cập nhật loại truyện thành công!');
    }

    public function destroy($id)
    {
        TypeNovel::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa loại truyện thành công!');
    }


    public function management_type_index()
    {
        $typenovel = TypeNovel::orderBy('id', 'DESC')->get();
        return view('admin_cpanel.typenovel.type_index')->with(compact('typenovel'));
    }

    public function management_type_create()
    {
        return view('admin_cpanel.typenovel.type_create');
    }

    public function management_type_edit($id)
    {
        $type = TypeNovel::find($id);
        return view('admin_cpanel.typenovel.type_edit')->with(compact('type'));
    }

}
