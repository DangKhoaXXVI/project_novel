@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Danh sách thành viên</div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Thông tin về bản thân</th>
                            <th scope="col">Sở thích</th>
                            <th scope="col">Chức vụ</th>
                            <th scope="col">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $key => $values)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td><img src="{{asset('uploads/user/'.$values->avatar)}}" height="250" width="180"></td>
                                <td>{{$values->name}}</td>
                                <td>{{$values->birthday}}</td>
                                <td>{{$values->about}}</td>
                                <td>{{$values->favorite}}</td>
                                <td>
                                    @if($values->role==1)
                                        <span class="text text-success">Admin</span>
                                    @else
                                        <span class="text text-primary">Thành viên</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin_edit_member', ['id' => $values->id] ) }}" class="btn btn-primary">Chỉnh sửa</a>
                                    <form action="" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có chắc là muốn xóa thành viên này không?');" class="btn btn-danger">
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
