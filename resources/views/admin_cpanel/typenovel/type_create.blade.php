@extends('admin.management')
@section('content')

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Thêm loại truyện
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5" style="justify-content: center!important;">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger show flex items-center mb-2" role="alert">
                        <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> {{ $error }}
                    </div>
                @endforeach
            @endif
            <div class="intro-y box p-5">
                <form method="POST" action="{{route('loai-truyen.store')}}" enctype='multipart/form-data'>
                    @csrf
                    <div>
                        <label for="crud-form-1" class="form-label">Tên loại truyện</label>
                        <input type="text" class="form-control" value="{{old('typename')}}" onkeyup="ChangeToSlug();" name="typename" id="slug" placeholder="Tên loại truyện...">
                        <input type="hidden" class="form-control" value="{{old('slug_typename')}}" name="slug_typename" id="convert_slug"  placeholder="Slug loại truyện...">
                    </div>
                    <div class="mt-3">
                        <label for="crud-form-1" class="form-label">Trạng thái</label>
                        <select name="status" class="custom-select">
                            <option value="0">Kích hoạt</option>
                            <option value="1">Không kích hoạt</option>
                        </select>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ route('typenovel_index') }}">
                            <button type="button" class="btn btn-outline-secondary w-24 mr-1">Hủy</button>
                        </a>
                        <button type="submit" class="btn btn-primary w-24">Thêm</button>
                    </div>
                </form>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>

@endsection