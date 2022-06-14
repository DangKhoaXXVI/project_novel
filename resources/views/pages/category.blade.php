@extends('../welcome')
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

</style>


<!-- Truyện Mới Nhất -->
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <section class="index-section thumb-section-flow last-chapter translation three-row">
                    <header class="section-title">
                        <span class="sts-bold">Thể loại</span>
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
                                        <img class="card-img-top" src="{{ asset('uploads/novel/'.$value->image) }}" alt="{{$value->novelname}}">
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
    </div>


    
@endsection