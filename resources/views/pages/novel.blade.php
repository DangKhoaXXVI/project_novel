@extends('../welcome')
@section('content')

<style type="text/css">

.collapse.in {
    display: block;
}

</style>

    <div class="row mt-4 novelpage">
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
                                        <i class="fa fa-eye"></i>
                                        <span class="info-name" >Lượt xem:</span>
                                        <span class="info-value ">
                                            {{ $novel->novel_views }}
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
                                        <span class="series-owner_name"><a href="">{{ $user->name }}</a></span>
                                    </div>
                            </div>
                        </main>
                    </section>
                </div>
            </div>
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
@endsection