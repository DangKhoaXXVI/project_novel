@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm truyện</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="card-body">
                    <form method="POST" action="{{route('novel.store')}}" enctype='multipart/form-data'>
                        @csrf
                        <div class="form-group">
                            <label style="font-weight: 700">Tên truyện</label>
                            <input type="text" class="form-control" value="{{old('novelname')}}" onkeyup="ChangeToSlug();" name="novelname" id="slug" placeholder="Tên truyện...">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="{{old('slug_novelname')}}" name="slug_novelname" id="convert_slug"  placeholder="Slug truyện...">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Tác giả</label>
                            <input type="text" class="form-control" value="{{old('author')}}" onkeyup="ChangeToSlugAuthor();" name="author" id="slug_author" placeholder="Tên tác giả...">
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" value="{{old('slug_author')}}" name="slug_author" id="convert_slug_author"  placeholder="Slug author...">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Tóm tắt</label>
                            <textarea class="form-control" id="summary_content" name="summary" rows="5" style="resize: none"></textarea>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Loại truyện</label>
                                <select name="type" class="custom-select">
                                    @foreach($type as $key => $types)
                                    <option value="{{$types->id}}">{{$types->typename}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Thể loại</label><br>
                                <!-- <select name="category" class="custom-select">
                                    
                                    <option value="$categories->id">$categories->categoryname</option>
                                    
                                </select> -->
                                @foreach($category as $key => $categories)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="category[]" type="checkbox" id="category_{{$categories->id}}" value="{{$categories->id}}">
                                    <label class="form-check-label" for="category_{{$categories->id}}">{{$categories->categoryname}}</label>
                                </div>
                                @endforeach
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Tình trạng</label>
                                <select name="state" class="custom-select">
                                    <option value="0">Đang tiến hành</option>
                                    <option value="1">Đã hoàn thành</option>
                                    <option value="2">Tạm ngưng</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Ảnh bìa truyện</label>
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Trạng thái</label>
                                <select name="status" class="custom-select">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                        </div>
                        <button type="submit" name="add_novel" class="btn btn-primary">Thêm truyện</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
