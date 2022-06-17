@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Danh sách truyện</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container">
                        <a href="{{route('novel.create')}}" class="btn btn-success mb-4">+ Thêm</a>
                    </div>
                    <table class="table table-striped table-responsive">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Ảnh bìa</th>
                            <th scope="col">Tên truyện</th>
                            <!-- <th scope="col">Slug truyện</th> -->
                            <th scope="col">Tác giả</th>
                            <th scope="col">Thể loại</th>
                            <!-- <th scope="col">Loại truyện</th> -->
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Ngày cập nhật</th>
                            <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listnovel as $key => $novel)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td><img src="{{asset('uploads/novel/'.$novel->image)}}" height="250" width="180"></td>
                                <td>{{$novel->novelname}}</td>
                                <!-- <td>{{$novel->slug_novelname}}</td> -->
                                <td>{{$novel->author}}</td>
                                <td>
                                    @foreach($novel->belongstomanycategory as $incategories)
                                        <span class="badge badge-dark">{{$incategories->categoryname}}</span>
                                    @endforeach
                                </td>
                                <!-- <td>{{$novel->typenovel->typename}}</td> -->
                                <td>
                                    @if($novel->state==0)
                                        <span class="text text-primary">Đang tiến hành</span>
                                    @elseif($novel->state==1)
                                        <span class="text text-success">Đã hoàn thành</span>
                                    @else
                                        <span class="text text-warning">Tạm ngưng</span>
                                    @endif
                                </td>
                                <td>
                                    @if($novel->status==0)
                                        <span class="text text-success">Kích hoạt</span>
                                    @else
                                        <span class="text text-danger">Không kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    @if($novel->created_at != '')
                                    {{ $novel->created_at }} 
                                    @endif
                                </td>                                
                                <td>
                                    @if($novel->updated_at != '')
                                    {{ $novel->updated_at }}
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('novel.edit', [$novel->id])}}" class="btn btn-primary">Chỉnh sửa</a>
                                    <form action="{{route('novel.destroy', [$novel->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có chắc là muốn xóa truyện này không?');" class="btn btn-danger">
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
