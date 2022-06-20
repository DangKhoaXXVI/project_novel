<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Trang Chủ<span class="sr-only">(current)</span></a>
                    </li>
                        <a class="nav-link" href="{{route('novel.index')}}">Truyện</span></a>
                        <a class="nav-link" href="{{route('typenovel.index')}}">Loại truyện</span></a>
                        <a class="nav-link" href="{{route('category.index')}}">Thể loại</span></a>
                        <a class="nav-link" href="{{route('chapter.index')}}">Chương</span></a>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </nav>
</div>


