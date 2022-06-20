@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chỉnh sửa thể loại</div>
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

                    <form method="POST" action="{{route('category.update', [$category->id])}}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label style="font-weight: 700">Tên thể loại</label>
                            <input type="text" value="{{$category->categoryname}}" class="form-control" onkeyup="ChangeToSlug();" name="categoryname" id="slug" placeholder="Tên thể loại...">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Slug thể loại</label>
                            <input type="text" class="form-control" value="{{$category->slug_category}}" name="slug_category" id="convert_slug" placeholder="Slug thể loại...">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Trạng thái</label>
                                <select name="status" class="custom-select">
                                    @if($category->status==0)
                                        <option selected value="0">Kích hoạt</option>
                                        <option value="1">Không kích hoạt</option>
                                    @else
                                        <option value="0">Kích hoạt</option>
                                        <option selected value="1">Không kích hoạt</option>
                                    @endif
                                </select>
                        </div>

                        <button name="update_category" type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
