<div class="col-12 col-lg-3">
    <div class="maincontent-area">    
        <div class="container">   
            <section class="index-section">
                <header>
                    <div class="b_title"><strong><i class="fa-solid fa-thumbs-up"></i>    Có thể bạn sẽ thích</strong></div>
                </header>
                <main class="d-lg-block">
                    <ul class="others-list">
                        @foreach($maybe_you_will_like as $maybe)
                            <li>
                                <div class="others-img no-padding">
                                    <div class="a6-ratio">
                                        <div class="content img-in-ratio"> 
                                            <img  src="{{ asset('uploads/novel/'.$maybe->image) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="others-info">
                                    <h5 class="others-name"><a href="{{url('novel/'.$maybe->slug_novelname)}}">{{ $maybe->novelname }}</a></h5>
                                    <!-- <a class="text-truncate block" href="#">Chương 04 - Đã quyết định không vướng bận lấy nhau vậy mà</a> -->
                                    <small class="series-summary-2">{!! $maybe->summary !!}</small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </main>
            </section>
        </div>
    </div>
</div>



