@extends('../welcome')
@section('content')

<style type="text/css">

.collapse.in {
    display: block;
}

</style>

    <div class="container">
    <div class="row d-block clearfix mt-4 novelpage">
        <div class="col-xs-12 col-sm-12 col-md-9 float-left feature-section">
            <section>
                <main>
                    <div class="top-part" >
                        <div class="row">
                            <div class="left-column col-12 col-md-3">
                                <img class="card-img-top" src="{{ asset('uploads/novel/'.$novel->image) }}">
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="series-name-group" >
                                    <span class="series-name" >
                                        <a href="">
                                            {{ $novel->novelname }}
                                        </a>
                                    </span>
                                </div>
                                <div class="series-information" >
                                    <div class="series-categories">
                                        @foreach($novel->belongstomanycategory as $incategories)
                                        <a class="series-gerne-item"  href="{{url('category/'.$incategories->slug_category)}}">{{ $incategories->categoryname }}</a>
                                        @endforeach
                                    </div>
                                    <div class="info-item" >
                                    <i class="fa fa-user"></i>
                                        <span class="info-name" >Tác giả:</span>
                                        <span class="info-value ">
                                            <a href="{{ url('author/'.$novel->slug_author ) }}">
                                            {{ $novel->author }}
                                            </a>
                                        </span>
                                    </div>
                                    <div class="info-item" >
                                        <i class="fa fa-rss"></i>
                                        <span class="info-name" >Tình trạng:</span>
                                        <span class="info-value ">
                                            @if($novel->state==0)
                                                Đang tiến hành
                                            @elseif($novel->state==1)
                                                Đã hoàn thành
                                            @else
                                                Tạm ngưng
                                            @endif
                                        </span>
                                    </div>
                                    @if(isset($nguoidung))
                                        @if(isset($ratingUser) || $ratingUser>0)
                                            <div class="info-item" >
                                                <i class="fa fa-star"></i>
                                                <span class="info-name" >Đánh giá của bạn:</span>
                                                <span class="info-value ">
                                                    <div class='starrr'>
                                                        @for($i = 1; $i <= $ratingUser->rating_star; $i++)
                                                            <a class="fa-star fa"></a>      
                                                        @endfor
                                                        <!-- @for($j = $ratingUser->rating_star+1; $j <= 5; $j++)
                                                            <a class="fa-star-o fa"></a>
                                                        @endfor -->
                                                    </div>
                                                </span>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="info-item" >
                                        <i class="fa fa-star"></i>
                                        <span class="info-name" >Tổng đánh giá của truyện:</span>
                                        <span class="info-value ">
                                            @if($rating->count() > 0)
                                                {{ number_format($ratingAvg, 1) }} / 5 ({{ $rating->count() }} lượt đánh giá)
                                            @else
                                                Truyện chưa được đánh giá bởi ai cả... 
                                            @endif
                                        </span>
                                    </div>
                                    <div class="info-item" >
                                        <i class="fa fa-calendar"></i>
                                        <span class="info-name" >Ngày đăng truyện:</span>
                                        <span class="info-value ">
                                            {{ $novel->created_at->toDateString() }}
                                        </span>
                                    </div>
                                    <div class="info-item" >
                                        <i class="fa fa-calendar"></i>
                                        <span class="info-name" >Lần cuối cập nhật:</span>
                                        <span class="info-value ">
                                            {{ $novel->updated_at->toDateString()}}
                                        </span>
                                    </div>
                                </div>
                                <div class="side-features">
                                    <div class="row">
                                        <div class="col-4 col-md feature-item width-auto-x1">
                                            <div class="side-feature-button button-rate wishlist">
                                                <span class="block feature-value">
                                                        <i class="fas fa-heart"></i>
                                                </span>
                                                <span class="block feature-name">{{ $novel->novel_views }} lượt yêu thích</span>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md feature-item width-auto-x1">
                                            <div class="series-rating rated">
                                                <label for="open-rating" class="side-feature-button button-rate">
                                                    <span class="block feature-value">
                                                        @if($ratingUser)
                                                            <i class="fa-solid fa-star"></i>
                                                        @else
                                                            <i class="far fa-star"></i>
                                                        @endif
                                                    </span>
                                                    <span class="block feature-name">Đánh giá</span>
                                                </label>
                                                <input type="checkbox" id="open-rating">
                                                    <div class="series-evaluation clear">
                                                        @if(isset($nguoidung))
                                                            <div class="rating text-center">
                                                                <div class='starrr' id='star1'></div>
                                                            </div>
                                                            <form action="{{ route('rating-novel') }}" method="POST" class="form-inline" id="formRating">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" name="rating_star" id="rating_star">
                                                                    <input type="hidden" class="form-control" name="novel_id" value="{{ $novel->id }}">
                                                                    <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                                                                </div>
                                                            </form>
                                                        @else
                                                            <div class="rating text-center">
                                                                <div class='starrr' id='star2'></div>
                                                            </div>
                                                        @endif
                                                    </div>     
                                            </div>
                                        </div>
                                        <div class="col-4 col-md feature-item width-auto-x1">
                                            <div class="side-feature-button button-rate viewed">
                                                <span class="block feature-value">
                                                        <i class="fa fa-eye"></i>
                                                </span>
                                                <span class="block feature-name">{{ $novel->novel_views }} lượt xem</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                


                            </div>
                        </div>
                    </div>
                    <div class="bottom-part" >
                        <div class="summary-wrapper col-12" >
                            <div class="series-summary" >
                                <h4>Tóm tắt</h4>
                            </div>
                            <div class="summary-content">
                                <p>{!! $novel->summary !!}</p>
                            </div>
                        </div>
                    </div>
                </main>
            </section>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 float-right">
            <div class="row top-group">
                <div class="col-12 no-push push-3-m col-md-6 no-push-l col-lg-12">
                    <section class="series-users">
                        <main>
                            <div class="series-owner group-mem">
                                <img src="{{ asset('uploads/user/'.$user->avatar) }}" alt="Poster's avatar">
                                    <div class="series-owner-title">
                                        <span class="series-owner_name"><a href="{{ url('member/'.$user->id) }}">{{ $user->name }}</a></span>
                                    </div>
                            </div>
                        </main>
                    </section>
                </div>
            </div>
            @php
                $count_novel_uploaded = count($novel_uploaded);
            @endphp
            @if($count_novel_uploaded>0)
                <section class="basic-section">
                    <header class="sect-header">
                        <span class="sect-title">Truyện cùng người đăng</span>
                    </header>
                    <main class="d-lg-block">
                        <ul class="others-list">
                            @foreach($novel_uploaded as $novel_up)
                                <li>
                                    <div class="others-img no-padding">
                                        <div class="a6-ratio">
                                            <div class="content img-in-ratio"> 
                                                <img  src="{{ asset('uploads/novel/'.$novel_up->image) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="others-info">
                                        <h5 class="others-name"><a href="{{url('novel/'.$novel_up->slug_novelname)}}">{{ $novel_up->novelname }}</a></h5>
                                        <small class="series-summary-2">{!! $novel_up->summary !!}</small>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </main>
                </section>
            @endif
            <section class="basic-section">
                <header class="sect-header">
                    <span class="sect-title">Truyện nổi bật</span>
                </header>
                <main class="d-lg-block">
                    <ul class="others-list">
                        @foreach($top4_novel as $top4)
                            <li>
                                <div class="others-img no-padding">
                                    <div class="a6-ratio">
                                        <div class="content img-in-ratio"> 
                                            <img  src="{{ asset('uploads/novel/'.$top4->image) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="others-info">                                        
                                    <h5 class="others-name"><a href="{{url('novel/'.$top4->slug_novelname)}}">{{ $top4->novelname }}</a></h5>
                                    <i class="fa fa-eye"></i>
                                        <span>Lượt xem:</span>
                                        <span>
                                            {{ $top4->novel_views }}
                                        </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </main>
            </section>
        </div>
        
        @php
            $mucluc = count($chapter);
        @endphp
        @if($mucluc>0)
            <div class="col-12 col-lg-9 float-left" style="padding: 0;">
                <section class="volume-list at-series basic-section">
                    <header class="sect-header">
                        <a style="margin-left: 10px; float: right; font-size: 20px;" class="edit-icon" href=""><i class="fas fa-edit"></i></a>
                        <span class="sect-title"> Mục Lục </span>
                    </header>
                    <main class="d-lg-block">
                        <div class="row">
                            <div class="col-xs-4 col-offset-xs-4 col-md-2 col-sm-2 collapse in img-cover-small">
                                <img style="padding: 10px;" width="150px" src="{{ asset('uploads/novel/'.$novel->image) }}" alt="{{ $novel->novelname }}">
                            </div>
                            <div class="col-12 col-md-10">
                                <ul class="list-chapters at-series">
                                    @foreach($chapter as $key => $chapters)
                                        <li>
                                            <div class="chapter-name">
                                                <a href="{{url('chapter/'.$chapters->id.'-'.$chapters->slug_chapter)}}">{{ $chapters->title }}</a>
                                            </div>
                                            <div class="chapter-time">{{ $chapters->created_at->toDateString() }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </main>
                </section>
            </div>
        @else
            <div class="col-12 col-lg-9 float-left" style="padding: 0; cursor: not-allowed; opacity: .5; pointer-events: none;">
                <section class="volume-list at-series basic-section">
                    <header class="sect-header">
                        <a style="margin-left: 10px; float: right; font-size: 20px;" class="edit-icon" href=""><i class="fas fa-edit"></i></a>
                        <span class="sect-title"> Mục Lục </span>
                    </header>
                    <main class="d-lg-block">
                        <div class="row">
                            <div class="col-xs-4 col-offset-xs-4 col-md-2 col-sm-2 collapse in">
                                <img style="padding: 10px;" width="150px" src="{{ asset('uploads/novel/'.$novel->image) }}" alt="{{ $novel->novelname }}">
                            </div>
                            <div class="col-12 col-md-10">
                                <ul class="list-chapters at-series">
                                    @foreach($chapter as $key => $chapters)
                                        <li>
                                            <div class="chapter-name">
                                                <a href="{{url('chapter/'.$chapters->id.'-'.$chapters->slug_chapter)}}">{{ $chapters->title }}</a>
                                            </div>
                                            <div class="chapter-time">{{ $chapters->created_at->toDateString() }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </main>
                </section>
            </div>
        @endif
    </div>
    </div>

@endsection