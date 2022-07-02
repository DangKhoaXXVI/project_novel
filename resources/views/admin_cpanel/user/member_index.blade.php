@extends('admin.management')
@section('content')
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <div class="hidden md:block mx-auto text-slate-500">
                <h2 class="intro-y text-lg font-medium mt-10">
                    Danh sách thành viên
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
                        <th class="whitespace-nowrap">AVATAR</th>
                        <th class="whitespace-nowrap">TÊN</th>
                        <th class="whitespace-nowrap">THÔNG TIN VỀ BẢN THÂN</th>
                        <th class="whitespace-nowrap">SỞ THÍCH</th>
                        <th class="text-center whitespace-nowrap">NGÀY SINH</th>
                        <th class="text-center whitespace-nowrap">CHỨC VỤ</th>
                        <th class="text-center whitespace-nowrap">CHỨC NĂNG</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $key => $values)
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="flex">
                                    <div class="w-20 h-20 image-fit zoom-in">
                                        <img class="tooltip rounded-full" src="{{asset('uploads/user/'.$values->avatar)}}" title="{{$values->name}}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                {{$values->name}}
                            </td>
                            <td>
                                {{$values->about}}
                            </td>
                            <td>
                                {{$values->favorite}}
                            </td>
                            <td class="text-center">
                                {{$values->birthday}}
                            </td>
                            <td class="w-40">
                                @if($values->role==1)
                                    <div class="flex items-center justify-center text-success"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Quản trị viên </div>
                                @else
                                    <div class="flex items-center justify-center text-primary"> <i data-lucide="check-square" class="w-4 h-4 mr-2"></i> Thành viên </div>
                                @endif
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3 text-primary" href="{{ route('member_edit', ['id' => $values->id]) }}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Sửa </a>
                                    <form action="#" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có chắc là muốn xóa thành viên này không?');">
                                            <a class="flex items-center text-danger" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Xóa </a>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->

        <!-- END: Pagination -->
    </div>
@endsection
            