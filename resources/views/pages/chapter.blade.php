@extends('../welcome')
@section('content')



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
                @if($chapter->id == $min_id->id)
                <a href="" class="col text-center {{ $chapter->id == $min_id->id ? 'isDisable' : '' }}"><i class="fas fa-backward"></i></a>
                @else
                <a href="{{ url('chapter/'.$previous_chapter_id.'-'.$previous_chapter_slug->slug_chapter) }}" class="col text-center {{ $chapter->id == $min_id->id ? 'isDisable' : '' }}"><i class="fas fa-backward"></i></a>
                @endif
                <span>
                    <select name="select-chapter" class="custom-select select-chapter">
                        @foreach($all_chapter as $key => $chap)
                        <option value="{{url('chapter/'.$chap->id.'-'.$chap->slug_chapter) }}">{{ $chap->title }}</option>
                        @endforeach
                    </select>
                </span>
                @if($chapter->id == $max_id->id)
                <a href="" class="col text-center {{ $chapter->id == $max_id->id ? 'isDisable' : '' }}"><i class="fas fa-forward"></i></a>
                @else
                <a href="{{ url('chapter/'.$next_chapter_id.'-'.$next_chapter_slug->slug_chapter ) }}" class="col text-center {{ $chapter->id == $max_id->id ? 'isDisable' : '' }}"><i class="fas fa-forward"></i></a>
                @endif
            </section>
            <div id="chapter-content" class="long-text no-select" style="padding-left: 0px; padding-right: 0px;">
                {!! $chapter->content !!}
                <h3 align="center">- Hết -</h3>
            </div>
            <div style="text-align: center; margin: 20px auto 10px auto;">
            </div>
            <section class="rd-basic_icon row">
            @if($chapter->id == $min_id->id)
                <a href="" class="col text-center {{ $chapter->id == $min_id->id ? 'isDisable' : '' }}"><i class="fas fa-backward"></i></a>
                @else
                <a href="{{ url('chapter/'.$previous_chapter_id.'-'.$previous_chapter_slug->slug_chapter) }}" class="col text-center {{ $chapter->id == $min_id->id ? 'isDisable' : '' }}"><i class="fas fa-backward"></i></a>
                @endif
                <a href="{{ url('novel/'.$chapter->novel->slug_novelname) }}" class="col text-center"><i class="fas fa-home"></i></a>
                @if($chapter->id == $max_id->id)
                <a href="" class="col text-center {{ $chapter->id == $max_id->id ? 'isDisable' : '' }}"><i class="fas fa-forward"></i></a>
                @else
                <a href="{{ url('chapter/'.$next_chapter_id.'-'.$next_chapter_slug->slug_chapter ) }}" class="col text-center {{ $chapter->id == $max_id->id ? 'isDisable' : '' }}"><i class="fas fa-forward"></i></a>
                @endif
            </section>
        </div>
    </div>
</div>


@endsection