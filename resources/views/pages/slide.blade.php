<style>
.top-tab_title.title-active {
    background-color: rgba(25,26,26,.8);
    color: #fff;
    display: inline-block;
    padding: 4px 8px;
}

.top-tab_title {
    border-bottom: 2px solid transparent;
    color: #aaa;
    font-weight: 700;
    margin-right: 10px;
}

.top-tab_title.title-active i {
    color: #f0bc00;
    display: inline;
}

.fa, .far, .fas {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    line-height: 1;
    -webkit-font-smoothing: antialiased;
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

.slide-item {
    display: block;
    height: 220px;
    position: relative;
    margin-bottom: 15px;
}

.slide-item .image {
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

.owl-carousel .owl-item img {
    width: 90%;
}

.slide-item .series-info {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 90%;
    margin-left: 5%;
    padding: 10px;
    background-image: linear-gradient(180deg,transparent,rgba(0,0,0,.5) 20%,rgba(0,0,0,.9));
}

.slide-item .series-info .series {
    font-size: 16px;
    margin-top: 15px;
    height: 44px;
    text-overflow: ellipsis;
    overflow: hidden;
    text-align: center;
    color: #ffffff;
    font-weight: 1000;
}

.slide-item .series-info .series:hover {
    color: #799a19;
}

/* style="height: 230px; width: 190px;" */
</style>
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-9">
            <!-- <span class="top-tab_title title-active mt-4"><i class="fas fa-trophy"></i> Truyện Nổi bật</span> -->
            <div class="b_title"><strong><i class="fas fa-trophy"></i>    Truyện Nổi Bật</strong></div>
            <div class="owl-carousel owl-theme mt-5">
                @foreach($top8_novel as $key => $top)
                    <div class="slide-item">
                        <a href="{{url('novel/'.$top->slug_novelname)}}" title="">
                            <div class="item">
                                <img class="image lazy" src="{{ asset('uploads/novel/'.$top->image) }}">
                            </div>
                            <div class="series-info">
                                <div class="series">
                                   {{ $top->novelname }}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="tin-tuc">
                <div class="b_title"><strong><i class="far fa-newspaper"></i> Tin Tức</strong></div>
                <p><a title="" href="">
                    Bài viết thử nghiệm... </a></p>
                    <div class="note">
                        <a href="">Xem Thêm &gt;&gt;</a>
                    </div>
            </div>
        </div>
    </div>
</div>

                