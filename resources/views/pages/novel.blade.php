@extends('../welcome')
@section('content')

<style type="text/css">
.top-part {
    padding: 10px;
}
.series-name-group {
    margin-bottom: 10px;
}
.series-name {
    display: block;
    font-weight: 700;
}
.series-information {
    margin-bottom: 80px;
}
.series-gerne-item {
    background-color: #eee;
    border-radius: 20px;
    display: inline-block;
    margin-bottom: 10px;
    margin-right: 10px;
    padding: 0 10px;
}
.info-item {
    margin-bottom: 10px;
}
.info-item .info-name {
    font-weight: 700;
    margin-right: 6px;
}
.summary-wrapper {
    border-top: 1px solid #d4dae2;
    margin-top: 10px;
    padding-top: 10px;
}
.series-summary {
    margin-bottom: 10px;
}
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

.basic-section {
    margin-bottom: 20px;
    background-color: hsla(0,0%,100%,.9);
    border-color: #e4e5e7 #dadbdd hsla(210,4%,80%,.8);
    border-radius: 4px;
    border-style: solid;
    border-width: 1px;
    overflow: hidden;
}

.basic-section .sect-header {
    font-weight: 700;
    background-color: #f4f5f6;
    border-bottom: 1px solid #dadbdd;
    padding: 10px;
}

.volume-list.at-series .sect-title {
    display: block;
    padding-right: 60px;
}

.volume-cover {
    margin-bottom: 20px;
    text-align: center;
}

ul.list-chapters {
    margin: 0;
    padding: 0;
    list-style: none;
    text-decoration: none;
}

ul.list-chapters li {
    padding: 10px 10px;
    position: relative;
}

ul.list-chapters li .chapter-name {
    padding-right: 86px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

ul.list-chapters li .chapter-time {
    color: #aaa;
    font-size: 1rem;
    position: absolute;
    right: 10px;
    top: 10px;
}

.volume-cover .a6-ratio {
    margin: auto;
    max-width: 200px;
}

.a6-ratio {
    position: relative;
}

.a6-ratio>.content {
    bottom: 0;
    left: 0;
    position: absolute;
    right: 0;
    top: 0;
}

.img-in-ratio {
    background-position: 50%;
    background-repeat: no-repeat;
    background-size: 100% 100%;
}

</style>

    <div class="row">
        <div class="col-12 col-lg-9 float-left">
            <section>
                <main>
                    <div class="top-part" >
                        <div class="row">
                            <div class="left-column col-12 col-md-3">
                                <img class="card-img-top" src="{{ asset('uploads/novel/'.$novel->image) }}" alt="Card image cap">
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
                                        <a class="series-gerne-item"  href="">Comedy</a>
                                    </div>
                                    <div class="info-item" >
                                        <span class="info-name" >Tác giả:</span>
                                        <span class="info-value ">
                                            <a href="">
                                            {{ $novel->author }}
                                            </a>
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
                                <p>{{ $novel->summary }}</p>
                            </div>
                        </div>
                    </div>
                </main>
            </section>
        </div>

        <div class="col-12 col-lg-3 float-right">
            <h3>Chú Thích Thêm</h3>
        </div>
        <div class="col-12 col-lg-9 float-left">
            <section class="volume-list at-series basic-section">
                <header class="sect-header">
                    <span class="sect-title"> Mục Lục </span>
                </header>
                <main class="d-lg-block">
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <div class="volume-cover">
                                <a href="">
                                    <div class="a6-ratio">
                                        <div class="content img-in-ratio">
                                            <img style="padding: 10px;" class="card-img-top" src="{{ asset('uploads/novel/'.$novel->image) }}">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-md-10">
                            <ul class="list-chapters at-series">
                                @php
                                    $mucluc = count($chapter);
                                @endphp
                                @if($mucluc>0)
                                    @foreach($chapter as $key => $chapters)
                                    <li>
                                        <div class="chapter-name">
                                            <a href="{{url('read-chapter/'.$chapters->slug_chapter)}}">{{ $chapters->title }}</a>
                                        </div>
                                        <div class="chapter-time">21/05/2022</div>
                                    </li>
                                    @endforeach
                                @else
                                    <li>Truyện chưa đăng chương nào...</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </main>
            </section>
        </div>
    </div>
@endsection