@extends('../welcome')

@section('title')
    {{ "Danh sách truyện yêu thích" }}
@endsection

@section('member')

<main id="mainpart" class="user-page">
    <div class="container">
        <div class="row d-block clearfix">
            <div class="col-12 col-lg-9 float-left">
                <section class="basic-section" style="margin-top: 30px;">
                    @if($listFavorite->count() > 0)
                    <table class="table table-borderless listext-table has-covers">
                        <tbody>
                            <tr>
                                <th class="col-8 col-md-6">Tên truyện</th>
                                <th class="none table-cell-m col-md-4">Tên tác giả</th>
                                <th class="col-4 col-md-2 text-right">Loại bỏ</th>
                            </tr>
                            @foreach($listFavorite as $key => $favorite)
                            @if($favorite->novel->status == 0)
                            <tr>
                                <td>
                                    <div class="a6-ratio series-cover">
                                        <div class="content img-in-ratio">
                                            <img  src="{{ asset('uploads/novel/'.$favorite->novel->image) }}">
                                        </div>
                                    </div>
                                    <div class="series-name">
                                        <a href="{{ route('novel', ['slug' => $favorite->novel->slug_novelname] ) }}">{{ $favorite->novel->novelname }}</a>
                                        <small class="type-translation">
                                            @if($favorite->novel->state==0)
                                                <p style="color: #007bff;">Đang tiến hành</p>
                                            @elseif($favorite->novel->state==1)
                                                <p style="color: #36a189;">Đã hoàn thành</p>
                                            @else
                                                <p style="color: #dc3545;">Tạm ngưng</p>
                                            @endif
                                        </small>
                                    </div>
                                </td>
                                <td class="none table-cell-m">
                                    <a href="{{ route('ListNovelAuthor', ['author' => $favorite->novel->slug_author] ) }}">{{ $favorite->novel->author }}</a>
                                </td>
                                <td class="text-right update-action">
                                    <span class="remove-favorite">
                                        <i style="color: #e22590; cursor: pointer;" class="fa-solid fa-heart-circle-minus" onclick="submitRemoveFavoriteList()"></i>
                                        <form action="{{ route('favorite') }}" method="POST" class="form-inline" id="removeFormFavorite">
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" name="novel_id" value="{{ $favorite->novel->id }}">
                                                <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                                            </div>
                                        </form>
                                    </span>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center center-pagination">
                    {{ $listFavorite->links() }}
                    </div>
                    @else
                        <h4>Bạn chưa thêm truyện nào vào danh sách yêu thích cả...</h4>
                    @endif
                </section>
            </div>
        </div>
    </div>
</main>


@endsection