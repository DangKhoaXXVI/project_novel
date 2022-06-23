@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chỉnh sửa thành viên</div>
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
                    <form method="POST" action="{{ route('admin_update_member', ['id' => $user->id]) }}">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label style="font-weight: 700">Avatar</label>
                            <img src="{{asset('uploads/user/'.$user->avatar)}}" height="250" width="180">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Tên</label><br>
                            <label>{{$user->name}}</label>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Chức vụ</label>
                                <select name="role" class="custom-select">
                                    @if($user->role==0)
                                        <option selected value="0">Thành viên</option>
                                        <option value="1">Admin</option>
                                    @else
                                        <option value="0">Thành viên</option>
                                        <option selected value="1">Admin</option>
                                    @endif
                                </select>
                        </div>
                        

                        <button name="admin_update_member" type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
