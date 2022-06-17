@extends('../welcome')
@section('content')

<style type="text/css">

.reading-content, .reading-content h2, .reading-content h4, .reading-content h5 {
    line-height: 1.5em;
}

h2, h3, h4 {
    color: #333;
    font-weight: 700;
    margin-bottom: 0.2em;
}

#chapter-content {
    font-size: 18px;
    line-height: 28px;
    margin-top: 40px;
}

.rd-basic_icon {
    background-color: #eee;
    border: 1px solid #d0d0d0;
    border-radius: 30px;
    height: 40px;
    margin: 30px 0;
    overflow: hidden;
    width: 100%;
}

.row {
    display: flex;
    flex-wrap: wrap;
}

.rd-basic_icon a {
    cursor: pointer;
    font-size: 20px;
    padding: 8px;
}

.isDisable {
    color: currentColor;
    pointer-events: none;
    opacity: 0.5;
    text-decoration: none;
}


</style>



<div class="container">
    <div class="row">
        <div class="reading-content col-12 col-lg-10 offset-lg-1" style="word-wrap: break-word;">
            <div class="title-top" style="padding-top: 20px">
                <h2 class="title-item" align="center">{{ $chapter->novel->novelname }}</h2>
                <h4 class="title-item" align="center">{{ $chapter->title }}</h4>
            </div>
            <div style="text-align: center; margin: 20px auto -20px auto;">
            </div>
            <section class="rd-basic_icon row">
                <a href="{{ url('chapter/'.$previous_chapter) }}" class="col text-center {{ $chapter->id == $min_id->id ? 'isDisable' : '' }}"><i class="fas fa-backward"></i></a>
                <span>
                    <select name="select-chapter" class="custom-select select-chapter">
                        @foreach($all_chapter as $key => $chap)
                        <option value="{{ url('chapter/'.$chap->slug_chapter) }}">{{ $chap->title }}</option>
                        @endforeach
                    </select>
                </span>
                <a href="{{ url('chapter/'.$next_chapter) }}" class="col text-center {{ $chapter->id == $max_id->id ? 'isDisable' : '' }}"><i class="fas fa-forward"></i></a>
            </section>
            <div id="chapter-content" class="long-text no-select" style="padding-left: 0px; padding-right: 0px;">
                {!! $chapter->content !!}
                <h3 align="center">- Hết -</h3>
            </div>
            <div style="text-align: center; margin: 20px auto 10px auto;">
            </div>
            <section class="rd-basic_icon row">
                <a href="{{ url('chapter/'.$previous_chapter) }}" class="col text-center {{ $chapter->id == $min_id->id ? 'isDisable' : '' }}"><i class="fas fa-backward"></i></a>
                <a href="{{ url('novel/'.$chapter->novel->slug_novelname) }}" class="col text-center"><i class="fas fa-home"></i></a>
                <a href="{{ url('chapter/'.$next_chapter) }}" class="col text-center {{ $chapter->id == $max_id->id ? 'isDisable' : '' }}"><i class="fas fa-forward"></i></a>
            </section>
        </div>
    </div>
</div>


@endsection