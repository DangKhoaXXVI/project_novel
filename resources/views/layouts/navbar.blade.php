                <nav class="navbar navbar-expand-lg navbar-light mainmenu-area">
                    <a class="navbar-brand" href="{{url('/')}}"><div class="logo"></div></a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a style="font-size: 18px; padding: 15px; color: #799a19; font-weight: 700;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Thể Loại
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($category as $key => $categories)
                                <a class="dropdown-item" href="{{url('category/'.$categories->slug_category)}}">{{$categories->categoryname}}</a>
                                @endforeach
                            </div>
                        </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm..." aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                        </form>
                        
                        <li class="ml-4"><a alt="Nền Tối" id="dark_theme"><i class="far fa-moon"></i></a></li>

                        @if(!isset($nguoidung))
                            <li class="ml-12" style="font-size: 18px; padding: 15px; color: #799a19; font-weight: 700;"><a href="{{ url('log-in') }}">Đăng Nhập</a></li>
                        @else
                            <li class="nav-item dropdown ml-12">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle usernamelogin" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="/uploads/user/{{ Auth::user()->avatar }}" style="width: 32px; height: 32px; position: absolute; bottom: 5px; left: -20px; border-radius: 50%;">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fa fa-btn fa-user"></i>
                                        Tài khoản
                                    </a>
                                    <a class="dropdown-item" href="{{ url('log-out') }}">
                                        <i class="fa fa-btn fa-sign-out"></i>
                                        Đăng xuất
                                    </a>
                                </div>
                            </li>
                        @endif
                    </div>
                </nav>