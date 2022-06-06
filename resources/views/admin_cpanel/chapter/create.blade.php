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
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{route('chapter.store')}}">
                        @csrf
                        <div class="form-group">
                            <label >Thuộc truyện</label>
                                <select name="novel_id" class="custom-select">
                                    @foreach($listnovel as $key => $novel)
                                    <option value={{$novel->id}}>{{$novel->novelname}}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group">
                            <label >Tên chương</label>
                            <input type="text" class="form-control" value="{{old('title')}}" onkeyup="ChangeToSlug();" name="title" id="slug" placeholder="Tên chương truyện...">
                        </div>
                        <div class="form-group">
                            <label >Slug chương</label>
                            <input type="text" class="form-control" value="{{old('slug_chapter')}}" name="slug_chapter" id="convert_slug"  placeholder="Slug chương truyện...">
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea class="form-control" name="content" rows="10" style="resize: none"></textarea>
                        </div>
                        <div class="form-group">
                            <label >Trạng thái</label>
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
