@extends('../welcome')
@section('slide')
    @include('pages.slide')
@endsection
@section('content')

    <div class="b_title"><strong>Truyện Mới Nhất</strong></div>
    <div class="gridlist">
        @foreach($novel as $key => $value)
        <div class="glitem">
            <a href="{{url('novel/'.$value->slug_novelname)}}">
                <div class="image">
                    <img class="lazy loaded" src="{{ asset('uploads/novel/'.$value->image) }}" alt="{{$value->novelname}}" width="100%" height="100%" data-was-processed="true">
                </div>
            </a>
            <a class="series-name" href="{{url('novel/'.$value->slug_novelname)}}">{{$value->novelname}}</a>
        </div>
        @endforeach
        <div class="glitem glitem-see-more">
            <a title="" href="">
                <div class="image lazy" style="">
                    <img class="lazy loaded" src="{{ asset('images/readmore.jpg') }}" alt="" width="100%" height="100%" data-was-processed="true">
                </div>
            </a>
            <div class="see-more"><div class="btn-see-more-icon">
                <i class="fas fa-angle-double-right"></i>
            </div>
        </div>
        <a class="series-name" title="Xem Thêm" href="">Xem Thêm</a>
    </div>
</div>
    
@endsection

@section('completed')
    @include('pages.completed')
@endsection