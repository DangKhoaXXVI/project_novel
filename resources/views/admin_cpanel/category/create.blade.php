@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm thể loại</div>
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
                    <form method="POST" action="{{route('category.store')}}">
                        @csrf
                        <div class="form-group">
                            <label style="font-weight: 700">Tên thể loại</label>
                            <input type="text" class="form-control" value="{{old('categoryname')}}" onkeyup="ChangeToSlug();" name="categoryname" id="slug" placeholder="Tên thể loại...">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Slug thể loại</label>
                            <input type="text" class="form-control" value="{{old('slug_category')}}" name="slug_category" id="convert_slug"  placeholder="Slug thể loại...">
                        </div>
                        <div class="form-group">
                            <label style="font-weight: 700">Trạng thái</label>
                                <select name="status" class="custom-select">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                        </div>

                        <button type="submit" name="add_category" class="btn btn-primary">Thêm thể loại</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
