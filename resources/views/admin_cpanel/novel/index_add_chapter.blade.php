@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm chương truyện</div>
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
                    <form method="POST" action="{{route('chapter.store')}}">
                        @csrf
                        <div class="form-group">
                            <label style="font-weight: 700">Thuộc truyện</label></br>
                            <label>{{ $novel->novelname }}</label></br>
                            <input type="hidden" name="novel_id" value="{{ $novel->id }}"></input>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Tên chương</label>
                            <input type="text" class="form-control" value="{{old('title')}}" onkeyup="ChangeToSlug();" name="title" id="slug" placeholder="Tên chương truyện...">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Slug chương</label>
                            <input type="hidden" class="form-control" value="{{old('slug_chapter')}}" name="slug_chapter" id="convert_slug"  placeholder="Slug chương truyện...">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Nội dung</label>
                            <textarea class="form-control" id="chapter_content" name="content" rows="10" style="resize: none"></textarea>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Trạng thái</label>
                                <select name="status" class="custom-select">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                        </div>

                        <button type="submit" name="add_chapter" class="btn btn-primary">Thêm chương truyện</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
