@extends('admin.management')

@section('title')
    {{ "Quản lý chương" }}
@endsection

@section('content')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('chapter_create', ['novel_id' => $novel->id]) }}">
                <button class="btn btn-primary shadow-md mr-2">+ Thêm chương</button>
            </a>
            <div class="hidden md:block mx-auto text-slate-500">
                <h2 class="intro-y text-lg font-medium mt-10">
                   {{ $novel->novelname }}
                </h2>
            </div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i> 
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">TÊN CHƯƠNG</th>
                        <th class="text-center whitespace-nowrap">TRẠNG THÁI</th>
                        <th class="text-center whitespace-nowrap">NGÀY ĐĂNG</th>
                        <th class="text-center whitespace-nowrap">LẦN CUỐI CẬP NHẬT</th>
                        <th class="text-center whitespace-nowrap">CHỨC NĂNG</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($chapter as $chap)
                        <tr class="intro-x">
                            <td>{{ $chap->title }}</td>
                            <td class="text-center">
                                @if($chap->status==0)
                                    <div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Kích hoạt </div>
                                @else
                                    <div class="flex items-center justify-center text-danger"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Không kích hoạt </div>
                                @endif
                            </td>
                            <td class="text-center">
                                {{ $chap->created_at }}
                            </td>
                            <td class="text-center">
                                {{ $chap->updated_at }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3 text-primary" href="{{ route('chapter_edit', ['id' => $chap->id]) }}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Sửa </a>
                                    <form action="{{route('chuong.destroy', [$chap->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có chắc là muốn xóa chương này không?');">
                                            <a class="flex items-center text-danger" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa </a>
                                        </button>
                                    </form>
                                    <!-- <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa </a> -->
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="intro-x">
                            <td></td>
                            <td class="w-40"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="table-report__action w-56"></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->

        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    <!-- <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">
                            Do you really want to delete these records? 
                            <br>
                            This process cannot be undone.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- END: Delete Confirmation Modal -->
@endsection
            