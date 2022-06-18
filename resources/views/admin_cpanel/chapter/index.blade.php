@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Danh sách các chương truyện</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <a href="{{route('chapter.create')}}" class="btn btn-success">+ Thêm</a>
                    </div>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên truyện</th>
                            <th scope="col">Tên chương</th>
                            <th scope="col">Slug chương truyện</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listchapter as $key => $chapter)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$chapter->novel->novelname}}</td>
                                <td>{{$chapter->title}}</td>
                                <td>{{$chapter->slug_chapter}}</td>
                                <td>
                                    @if($chapter->status==0)
                                        <span class="text text-success">Kích hoạt</span>
                                    @else
                                        <span class="text text-danger">Không kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $chapter->created_at }} 
                                </td>                                
                                <td>
                                    {{ $chapter->updated_at }}
                                </td>
                                <td>
                                    <a href="{{route('chapter.edit', [$chapter->id])}}" class="btn btn-primary">Chỉnh sửa</a>
                                    <form action="{{route('chapter.destroy', [$chapter->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có chắc là muốn xóa chương truyện này không?');" class="btn btn-danger">
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
