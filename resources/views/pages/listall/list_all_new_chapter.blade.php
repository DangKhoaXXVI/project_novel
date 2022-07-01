@extends('../welcome')

@section('title')
    {{ "Danh sách truyện" }}
@endsection

@section('content')

<div class="container-fluid p-40" id="mainpart">
    <div class="container">
        <div class="b_title"><strong>Danh Sách Truyện Có Chương Mới Nhất</strong></div>
            <div class="gridlist">
                @foreach($new_chapter as $key => $value)
                <div class="glitem">
                    <a href="{{route('novel', ['slug' => $value->novel->slug_novelname] )}}">
                        <div class="image">
                            <img class="lazy loaded" src="{{ asset('uploads/novel/'.$value->novel->image) }}" alt="{{$value->novel->novelname}}" width="100%" height="100%" data-was-processed="true">
                        </div>
                    </a>
                    <a class="series-name" href="{{route('novel', ['slug' => $value->novel->slug_novelname] )}}">{{$value->novel->novelname}}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



<div class="text-center center-pagination">
    {{ $new_chapter->links() }}
</div>

@endsection