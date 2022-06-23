@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Danh sách các loại truyện</div>

                <div class="card-body">
                    <div class="container">
                        <a href="{{route('typenovel.create')}}" class="btn btn-success">+ Thêm</a>
                    </div>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên loại truyện</th>
                            <th scope="col">Slug loại truyện</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($typenovel as $key => $type)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$type->typename}}</td>
                                <td>{{$type->slug_typename}}</td>
                                <td>
                                    @if($type->status==0)
                                        <span class="text text-success">Kích hoạt</span>
                                    @else
                                        <span class="text text-danger">Không kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('typenovel.edit', [$type->id])}}" class="btn btn-primary">Chỉnh sửa</a>
                                    <form action="{{route('typenovel.destroy', [$type->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có chắc là muốn xóa loại truyện này không?');" class="btn btn-danger">
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
