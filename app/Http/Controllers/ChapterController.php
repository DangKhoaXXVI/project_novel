<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;
use App\Models\Novel;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listchapter = Chapter::with('novel')->orderBy('id', 'DESC')->get();
        return view('admin_cpanel.chapter.index')->with(compact('listchapter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listnovel = Novel::orderBy('id', 'DESC')->get();
        return view('admin_cpanel.chapter.create')->with(compact('listnovel'));
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
                //'novel_id' => 'required',
                'title' => 'required|max:255',
                'slug_chapter' => 'required|max:255',
                'content' =>  'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'Phải có tên chương truyện!',
                'slug_chapter.required' => 'Phải có slug chương truyện!',
                'content.required' => 'Phải có nội dung chương truyện!',
            ]
        );
        $chapter = new Chapter();
        $chapter->novel_id = $data['novel_id'];
        $chapter->title = $data['title'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->content = $data['content'];
        $chapter->status = $data['status'];

        $chapter->save();
        return redirect()->back()->with('status', 'Thêm chương thành công!'); 
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
        $chapter = Chapter::find($id);
        $listnovel = Novel::orderBy('id', 'DESC')->get();
        return view('admin_cpanel.chapter.edit')->with(compact('listnovel', 'chapter'));
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
                'novel_id' => 'required',
                'title' => 'required|max:255',
                'slug_chapter' => 'required|max:255',
                'content' =>  'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'Phải có tên chương truyện!',
                'slug_chapter.required' => 'Phải có slug chương truyện!',
                'content.required' => 'Phải có nội dung chương truyện!',
            ]
        );
        $chapter = Chapter::find($id);
        $chapter->novel_id = $data['novel_id'];
        $chapter->title = $data['title'];
        $chapter->slug_chapter = $data['slug_chapter'];
        $chapter->content = $data['content'];
        $chapter->status = $data['status'];

        $chapter->save();
        return redirect()->back()->with('status', 'Cập nhật chương thành công!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::find($id)->delete();
        return redirect()->back()->with('status', 'Xóa chương thành công!'); 
    }
}
