@extends('../welcome')
@section('slide')
    @include('pages.slide')
@endsection
@section('content')

<style type="text/css">

h4 {
    color: #333;
    font-weight: 700;
    margin-bottom: 0.2em;
}

a {
    background-color: transparent;
    color: inherit;
    text-decoration: none;
}

a:hover {
    text-decoration: none;
}

a:-webkit-any-link {
    cursor: pointer;
}

.last-chapter {
    position: relative;
}

.index-section {
    margin-bottom: 40px;
}

.index-section .section-title {
    font-weight: 700;
    padding-bottom: 1em;
    padding-top: 1em;
}

.thumb-item-flow {
    margin-bottom: 10px;
    margin-top: 10px;
}

.thumb-item-flow .thumb-wrapper {
    color: #fff;
    position: relative;
}

.thumb-item-flow .thumb-detail {
    background: linear-gradient(180deg,transparent 0,rgba(0,0,0,.8) 67%,rgba(0,0,0,.8));
    bottom: 0;
    left: 0;
    overflow: hidden;
    padding: 10px;
    position: absolute;
    width: 100%;
}

.thumb-item-flow .thumb_attr.chapter-title {
    font-weight: 700;
}

.thumb-item-flow .thumb_attr.volume-title {
    color: #17deb3;
}

.thumb-item-flow .thumb_attr.series-title {
    font-size: 1.4rem;
    font-weight: 700;
    height: 4.2rem;
    line-height: 2rem;
    margin-bottom: 4px;
    margin-top: 6px;
    overflow: hidden;
    text-align: center;
}

.sts-bold {
    display: inline-block;
    font-size: 1.6rem;
    line-height: 2.2rem;
    background-color: rgba(26,26,26,.8);
    color: #fff;
    padding: 4px 8px;
}

.sts-empty {
    border-bottom: 2px solid rgba(26,26,26,.8);
    margin: 0 8px;
    text-transform: uppercase;
    display: inline-block;
    font-size: 1.6rem;
    line-height: 2.2rem;
}

.gridlist {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
}

.gridlist .glitem {
    display: block;
    width: 150px;
    height: 170px;
    position: relative;
    margin-bottom: 50px;
}

a.series-name {
    margin-left: 5%;
    position: absolute;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    bottom: 0;
    width: 90%;
    margin-bottom: -25px;
    font-size: 16px;
    font-weight: 700;
    text-align: center;
    color: #799a19;
}

a.series-name:hover {
    color: #337ab7;
}

.gridlist .glitem .image {
    position: absolute;
    top: 0;
    left: 0;
    width: 90%;
    margin-left: 5%;
    height: 100%;
    display: block;
    background-size: cover;
    background-position: center center;
}

.b_title {
    border-top: 3px solid #799a19;
    padding-top: 7px;
    margin-bottom: 30px;
}

.b_title strong {
    color: #fff;
    background: #799a19;
    padding: 10px 15px;
    font-weight: 700;
}

.see-more {
    height: 100%;
    background-color: rgba(12,12,12,.63);
    position: absolute;
    bottom: 0;
    left: 0;
    width: 90%;
    margin-left: 5%;
}

.btn-see-more-icon {
    font-size: 65px;
    padding: 25% 0 0 40px;
    position: absolute;
    color: #fff;
}

</style>


<!-- Truyện Mới Nhất -->
    <!-- <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <section class="index-section thumb-section-flow last-chapter translation three-row">
                    <header class="section-title">
                        <span class="sts-bold">Truyện</span>
                        <span class="sts-empty">mới nhất</span>
                    </header>
                </section>
                <main class="row">
                    @foreach($novel as $key => $value)
                    <div class="thumb-item-flow col-4 col-lg-2">
                        <div class="thumb-wrapper">
                            <a href="{{url('novel/'.$value->slug_novelname)}}" title="">
                                <div class="a6-ratio">
                                    <div class="content img-in-ratio lazyloaded">
                                        <img style="width: 90px; height: 130;"  src="{{ asset('uploads/novel/'.$value->image) }}" alt="{{$value->novelname}}">
                                    </div>
                                </div>
                            </a>
                            <div class="thumb-detail">
                                <div class="thumb_attr chapter-title" title=""><a href="" title=""></a></div>
                                    <div class="thumb_attr volume-title"></div>
                            </div>
                        </div>
                        <div class="thumb_attr series-title">
                            <a href="{{url('novel/'.$value->slug_novelname)}}" title="">{{$value->novelname}}</a>
                        </div>
                    </div>
                    @endforeach
                </main>
            </div>
        </div>
    </div> -->

    <!-- <section class="index-section thumb-section-flow last-chapter translation three-row">
        <header class="section-title">
            <span class="sts-bold">Truyện</span>
            <span class="sts-empty">mới nhất</span>
        </header>
    </section> -->
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