
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

    <div class="b_title"><strong>Truyện Đã Hoàn Thành</strong></div>
    <div class="gridlist">
        @foreach($completed_novel as $key => $completed)
        <div class="glitem">
            <a href="{{url('novel/'.$completed->slug_novelname)}}">
                <div class="image">
                    <img class="lazy loaded" src="{{ asset('uploads/novel/'.$completed->image) }}" alt="{{$completed->novelname}}" width="100%" height="100%" data-was-processed="true">
                </div>
            </a>
            <a class="series-name" href="{{url('novel/'.$completed->slug_novelname)}}">{{$completed->novelname}}</a>
        </div>
        @endforeach
        <div class="glitem glitem-see-more">
            <a title="" href="{{ url('admin/home/') }}">
                <div class="image lazy" style="">
                    <img class="lazy loaded" src="{{ asset('images/readmore.jpg') }}" alt="" width="100%" height="100%" data-was-processed="true">
                </div>
                <div class="see-more"><div class="btn-see-more-icon">
                    <i class="fas fa-angle-double-right"></i>
                </div>
            </a>
        </div>
        <a class="series-name" title="Xem Thêm" href="">Xem Thêm</a>
    </div>
</div>