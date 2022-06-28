@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chỉnh sửa loại truyện</div>
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
                    <form method="POST" action="{{route('typenovel.update', [$type->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label style="font-weight: 700">Tên loại truyện</label>
                            <input type="text" value="{{$type->typename}}" class="form-control" onkeyup="ChangeToSlug();" name="typename" id="slug" placeholder="Tên loại truyện...">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Slug loại truyện</label>
                            <input type="text" class="form-control" value="{{$type->slug_typename}}" name="slug_typename" id="convert_slug" placeholder="Slug loại truyện...">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Trạng thái</label>
                                <select name="status" class="custom-select">
                                    @if($type->status==0)
                                        <option selected value="0">Kích hoạt</option>
                                        <option value="1">Không kích hoạt</option>
                                    @else
                                        <option value="0">Kích hoạt</option>
                                        <option selected value="1">Không kích hoạt</option>
                                    @endif
                                </select>
                        </div>

                        <button name="update_typenovel" type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
