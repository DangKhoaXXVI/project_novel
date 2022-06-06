@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật truyện</div>
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

                    <form method="POST" action="{{route('novel.update', [$novel->id])}}" enctype='multipart/form-data'>
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label>Tên truyện</label>
                            <input type="text" class="form-control" value="{{$novel->novelname}}" onkeyup="ChangeToSlug();" name="novelname" id="slug" placeholder="Tên truyện...">
                        </div>
                        <div class="form-group">
                            <label>Slug truyện</label>
                            <input type="text" class="form-control" value="{{$novel->slug_novelname}}" name="slug_novelname" id="convert_slug"  placeholder="Slug truyện...">
                        </div>
                        <div class="form-group">
                            <label>Tác giả</label>
                            <input type="text" class="form-control" value="{{$novel->author}}" name="author" placeholder="Tên tác giả...">
                        </div>
                        <div class="form-group">
                            <label>Tóm tắt</label>
                            <textarea class="form-control" name="summary" rows="5" style="resize: none">{{$novel->summary}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Loại truyện</label>
                                <select name="type" class="custom-select">
                                    @foreach($type as $key => $types)
                                    <option {{$types->id == $novel->type_id ? 'selected' : ''}} value="{{$types->id}}">{{$types->typename}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Ảnh bìa truyện</label>
                            <input type="file" class="form-control-file" name="image">
                            <img src="{{asset('public/uploads/novel/'.$novel->image)}}" height="250" width="180">
                        </div>
                        <div class="form-group">
                            <label >Trạng thái</label>
                                <select name="status" class="custom-select">
                                    @if($novel->status==0)
                                        <option selected value="0">Kích hoạt</option>
                                        <option value="1">Không kích hoạt</option>
                                    @else
                                        <option value="0">Kích hoạt</option>
                                        <option selected value="1">Không kích hoạt</option>
                                    @endif
                                </select>
                        </div>
                        <button type="submit" name="update_novel" class="btn btn-primary">Cập nhật truyện</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
