@extends('../welcome')
@section('content')

<style type="text/css"> 

a.page-link{ 
    transition: .4s; 
} 

.page-link {
    color: #333;
}

a.page-link:hover { 
    color: white !important; background: #799a19 !important; 
}  

.pagination>.active>span {
    background-color: #749a19!important;
    border-color: #749a19!important;
    color: #fff!important;
}

nav {
    display: inline-block;
}

</style>

<div class="container-fluid" id="mainpart">
    <div class="container">
        <div class="b_title"><strong>Truyện của tác giả: {{ $novel_author_name->author }}</strong></div>
            <div class="gridlist">
                @foreach($novel_author as $key => $value)
                <div class="glitem">
                    <a href="{{url('novel/'.$value->slug_novelname)}}">
                        <div class="image">
                            <img class="lazy loaded" src="{{ asset('uploads/novel/'.$value->image) }}" alt="{{$value->novelname}}" width="100%" height="100%" data-was-processed="true">
                        </div>
                    </a>
                    <a class="series-name" href="{{url('novel/'.$value->slug_novelname)}}">{{$value->novelname}}</a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>



<div class="text-center">
    {{ $novel_author->links() }}
</div>

@endsection