@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật chương truyện</div>
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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('chapter.update',[$chapter->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label style="font-weight: 700">Thuộc truyện</label>
                                <select name="novel_id" class="custom-select">
                                    @foreach($listnovel as $key => $novel)
                                    <option {{ $chapter->novel_id == $novel->id ? 'selected' : '' }} value={{$novel->id}}>{{$novel->novelname}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Tên chương</label>
                            <input type="text" class="form-control" value="{{$chapter->title}}" onkeyup="ChangeToSlug();" name="title" id="slug" placeholder="Tên chương truyện...">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Slug chương</label>
                            <input type="text" class="form-control" value="{{$chapter->slug_chapter}}" name="slug_chapter" id="convert_slug"  placeholder="Slug chương truyện...">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Nội dung</label>
                            <textarea class="form-control" id="chapter_content" name="content" rows="10" style="resize: none">{{$chapter->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Trạng thái</label>
                                <select name="status" class="custom-select">
                                    @if($chapter->status==0)
                                        <option selected value="0">Kích hoạt</option>
                                        <option value="1">Không kích hoạt</option>
                                    @else
                                        <option value="0">Kích hoạt</option>
                                        <option selected value="1">Không kích hoạt</option>
                                    @endif
                                </select>
                        </div>

                        <button type="submit" name="update_chapter" class="btn btn-primary">Cập nhật chương truyện</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
