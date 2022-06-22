

<div class="maincontent-area">    
    <div class="container">
        <div class="row"> 
            <div class="col-xs-12 col-sm-12 col-md-9">
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

        <!-- <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="tin-tuc">
                <div class="b_title"><strong><i class="far fa-newspaper"></i> Tin Tức</strong></div>
                <p><a title="" href="">
                    Bài viết thử nghiệm... </a></p>
                    <div class="note">
                        <a href="">Xem Thêm &gt;&gt;</a>
                    </div>
            </div>
        </div> -->


        
    <!-- </div>
</div> -->

                