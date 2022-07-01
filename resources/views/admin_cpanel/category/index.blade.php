@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Danh sách thể loại truyện</div>

                <div class="card-body">
                    <div class="container">
                        <a href="{{route('the-loai.create')}}" class="btn btn-success">+ Thêm</a>
                    </div>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên thể loại</th>
                            <th scope="col">Slug thể loại</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($category as $key => $categories)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$categories->categoryname}}</td>
                                <td>{{$categories->slug_category}}</td>
                                <td>
                                    @if($categories->status==0)
                                        <span class="text text-success">Kích hoạt</span>
                                    @else
                                        <span class="text text-danger">Không kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('the-loai.edit', [$categories->id])}}" class="btn btn-primary">Chỉnh sửa</a>
                                    <form action="{{route('the-loai.destroy', [$categories->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có chắc là muốn xóa thể loại này không?');" class="btn btn-danger">
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                               
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
