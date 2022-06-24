@extends('../welcome')
@section('content')

<div class="container-fluid" id="mainpart">
    <div class="container">
        <div class="b_title"><strong>Danh Sách Tất Cả Truyện Đã Hoàn Thành</strong></div>
            <div class="gridlist">
                @foreach($list_completed_novel as $key => $value)
                <div class="glitem">
                    <a href="{{url('novel/'.$value->slug_novelname)}}">
                        <div class="image">
                            <img class="lazy loaded" src="{{ asset('uploads/novel/'.$value->image) }}" alt="{{$value->novelname}}" width="100%" height="100%" data-was-processed="true">
                        </div>
                    </a>
                    <a class="series-name" href="{{url('novel/'.$value->slug_novelname)}}">{{$value->novelname}}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



<div class="text-center center-pagination">
    {{ $list_completed_novel->links() }}
</div>

@endsection