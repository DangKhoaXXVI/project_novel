<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Admin<span class="sr-only">(current)</span></a>
                    </li>
                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{route('typenovel.index')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Loại truyện
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="">Thêm loại truyện</a>
                                <a class="dropdown-item" href="">Danh sách các loại truyện</a>
                            </div>
                                </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{route('novel.index')}}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Truyện
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Thêm tiểu thuyết</a>
                                <a class="dropdown-item" href="#    ">Danh sách tiểu thuyết</a>
                            </div>
                        </li> -->
                        <a class="nav-link" href="{{route('novel.index')}}">Truyện</span></a>
                        <a class="nav-link" href="{{route('typenovel.index')}}">Loại truyện</span></a>
                        <a class="nav-link" href="{{route('category.index')}}">Thể loại</span></a>
                        <a class="nav-link" href="{{route('chapter.index')}}">Chương</span></a>
                        
                                <!-- <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ 'Quản lý loại truyện' }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{route('typenovel.create')}}">
                                            {{'Thêm loại truyện'}}
                                        </a>
                                        <a class="dropdown-item" href="{{route('typenovel.index')}}">
                                            {{'Danh sách các loại truyện'}}
                                        </a>
                                    </div>
                                </li> -->
                                
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
        </div>
    </nav>
</div>


