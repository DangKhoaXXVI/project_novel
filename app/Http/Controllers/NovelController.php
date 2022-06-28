<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\TypeNovel;
use App\Models\Novel;
use App\Models\Category;
use App\Models\InCategory;
use App\Models\Chapter;
use Illuminate\Support\Facades\Auth;

class NovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listnovel = Novel::with('typenovel', 'belongstomanycategory')->orderBy('id', 'DESC')->get();
        return view('admin_cpanel.novel.index')->with(compact('listnovel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('id', 'DESC')->get();
        $type = TypeNovel::orderBy('id', 'DESC')->get();
        return view('admin_cpanel.novel.create')->with(compact('type', 'category'));
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
                'novelname' => 'required|unique:novel|max:255',
                'slug_novelname' => 'required|unique:novel|max:255',
                'author' => 'required|max:255',
                'slug_author' => 'required|max:255',
                'summary' =>  'required',
                'type' => 'required',
                'category' => 'required',
                'state' => 'required',
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100, min_height=100, max_width=3000, max_height=3000',
                'status' => 'required',
            ],
            [
                'novelname.unique' => 'Tên truyện này đã có!',
                'slug_novelname.unique' => 'Slug truyện này đã có!',
                'novelname.required' => 'Phải có tên truyện!',
                'slug_novelname.required' => 'Phải có slug truyện!',
                'author.required' => 'Phải có tên tác giả truyện!',
                'slug_author.required' => 'Phải có slug tác giả!',
                'summary.required' => 'Phải có tóm tắt truyện!',
                'image.required' => 'Phải có ảnh bìa truyện!',
            ]
        );
        $novel = new Novel();
        $novel->user_id = Auth::user()->id;
        $novel->novelname = $data['novelname'];
        $novel->slug_novelname = $data['slug_novelname'];
        $novel->author = $data['author'];
        $novel->slug_author = $data['slug_author'];
        $novel->summary = $data['summary'];
        $novel->type_id = $data['type'];
        $novel->state = $data['state'];
        $novel->status = $data['status'];

        $novel->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $novel->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        // foreach($data['category'] as $key => $categories) {
        //     $novel->category_id = $categories[0];
        // }

        // add a new image into folder
        $get_image = $request->image;
        $path = 'uploads/novel/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.',$get_name_image));
        $new_image = $name_image.'-'.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);
        $novel->image = $new_image;

        $novel->save();

        $novel->belongstomanycategory()->attach($data['category']);

        return redirect()->back()->with('status', 'Thêm truyện thành công!');
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
        $novel = Novel::find($id);

        $incategory = $novel->belongstomanycategory;

        $type = TypeNovel::orderBy('id', 'DESC')->get();
        $category = Category::orderBy('id', 'DESC')->get();

        return view('admin_cpanel.novel.edit')->with(compact('novel', 'type', 'category', 'incategory'));
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
                'novelname' => 'required|max:255',
                'slug_novelname' => 'required|max:255',
                'author' => 'required|max:255',
                'slug_author' => 'required|max:255',
                'summary' =>  'required',
                'type' => 'required',
                'category' => 'required',
                'state' => 'required',
                'status' => 'required',
            ],
            [
                'novelname.required' => 'Phải có tên truyện!',
                'slug_novelname.required' => 'Phải có slug truyện!',
                'author.required' => 'Phải có tên tác giả truyện!',
                'slug_author.required' => 'Phải có slug tác giả!',
                'summary.required' => 'Phải có tóm tắt truyện!',
            ]
        );
        $novel = Novel::find($id);
        $novel->novelname = $data['novelname'];
        $novel->slug_novelname = $data['slug_novelname'];
        $novel->author = $data['author'];
        $novel->slug_author = $data['slug_author'];
        $novel->summary = $data['summary'];
        $novel->type_id = $data['type'];
        $novel->state = $data['state'];
        $novel->status = $data['status'];

        $novel->updated_at = Carbon::now('Asia/Ho_Chi_Minh');

        // foreach($data['category'] as $key => $categories) {
        //     $novel->category_id = $categories[0];
        // }
        $novel->belongstomanycategory()->sync($data['category']);

        // add a new image into folder
        $get_image = $request->image;
        if($get_image) {
            $path = 'uploads/novel/'.$novel->image;
            if(file_exists($path)) {
                unlink($path);
            }
            $path = 'uploads/novel/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.'-'.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $novel->image = $new_image;
        }
        
        $novel->save();
        return redirect()->back()->with('status', 'Cập nhật truyện thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $novel = Novel::find($id);
        $path = 'uploads/novel/'.$novel->image;
        
        //Xóa ảnh bìa
        if(file_exists($path)) {
            unlink($path);
        }

        //Xóa thể loại
        InCategory::whereIn('novel_id', [$novel->id])->delete();

        //Xóa Chapter
        Chapter::whereIn('novel_id', [$novel->id])->delete();

        $novel->delete();
        return redirect()->back()->with('status', 'Xóa truyện thành công!');
    }
}
