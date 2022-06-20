  
                <nav class="navbar navbar-expand-lg navbar-light mainmenu-area">
                    <a class="navbar-brand" href="{{url('/')}}"><div class="logo"></div></a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" style="color: var(--lightgreen);" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Thể Loại
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($category as $key => $categories)
                                <a class="dropdown-item" href="{{url('category/'.$categories->slug_category)}}">{{$categories->categoryname}}</a>
                                @endforeach
                            </div>
                        </li>
                        </ul>
                        <form autocomplete="off" method="GET" action="{{ url('search') }}" accept-charset="UTF-8" class="navbar-form navbar-right">
                            @csrf
                            <div class="input-group">
                                <input type="search" id="keywords" class="search-input search_input form-control" placeholder="Tìm kiếm..." name="keywords">
                                <div class="input-group-btn searchbutton">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>                        
                        <li class="ml-4">
                            <div class="toggle"></div>
                        </li>

                        @if(!isset($nguoidung))
                            <li class="ml-12" style="font-size: 18px; padding: 15px; color: #799a19; font-weight: 700;"><a href="{{ url('log-in') }}">Đăng Nhập</a></li>
                        @else
                            <li class="nav-item dropdown ml-12">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle usernamelogin" style="color: var(--lightgreen);" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="/uploads/user/{{ Auth::user()->avatar }}" style="width: 32px; height: 32px; position: absolute; bottom: 5px; left: -20px; border-radius: 50%;">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('homeAdmin') }}">
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