@extends('layouts.app')

@section('content')
@include('layouts.nav')

      <main class="data-content">
        <div class="table-content">
            <p class="title-table">
                <div class="title-main">
                    <span class="title-1"><i class="fa fa-list"></i>Danh Sách Chương Truyện:</span>
                    <span class="title-2">{{ $novel->novelname }}</span>
                    <span class="button-create">
                      <a href="{{route('index_add_chapter', ['novel_id' => $novel->id])}}">
                        <button class="btn btn-success">Thêm Chương</button>
                      </a>
                    </span>
                </div>

                <div class="search-manager">
                  <form class="d-flex">
                    <input class="form-control me-2" type="text" placeholder="Tìm Chương">
                    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
                  </form>
                 </div>
                 </p>
            <table class="table table-striped secondary table-bordered">
              <thead>
                <tr>
                  <th>Tên Chương</th>
                  <th>Ngày Đăng</th>
                  <th>Cập Nhật Lần Cuối</th>
                  <th>Chức Năng</th> 
                </tr>
              </thead>
              <tbody>
                @forelse($chapter as $chap)
                <tr>
                  <td>{{ $chap->title }}</td>
                  <td>{{ $chap->created_at }}</td>
                  <td>{{ $chap->updated_at }}</td>

                  <td>
                    <button type="button" class="btn btn-success" data-bs-toggle="tooltip" title="Danh Sách Chương">
                        <a href="" > </a>
                        <i class="fa-solid fa-list"></i>
                    </button>
                    <a href="{{route('chapter.edit', [$chap->id])}}">
                    <button type="button" class="btn btn-primary" data-bs-toggle="tooltip" title="Sửa Chương">
                         
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    </a>
                  </td>

                </tr>
                @empty
                  <td>
                    Không Có Dữ Liệu
                  </td>
                @endforelse
              </tbody>
            </table>
        </div>

      </main>

@endsection