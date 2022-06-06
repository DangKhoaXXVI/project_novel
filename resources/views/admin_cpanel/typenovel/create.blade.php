@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm loại truyện</div>
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

                    <form method="POST" action="{{route('typenovel.store')}}">
                        @csrf
                        <div class="form-group">
                            <label >Tên loại truyện</label>
                            <input type="text" class="form-control" value="{{old('typename')}}" onkeyup="ChangeToSlug();" name="typename" id="slug" placeholder="Tên loại truyện...">
                        </div>
                        <div class="form-group">
                            <label >Slug loại truyện</label>
                            <input type="text" class="form-control" value="{{old('slug_typename')}}" name="slug_typename" id="convert_slug"  placeholder="Slug loại truyện...">
                        </div>
                        <div class="form-group">
                            <label >Trạng thái</label>
                                <select name="status" class="custom-select">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                        </div>

                        <button type="submit" name="add_typenovel" class="btn btn-primary">Thêm loại truyện</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
