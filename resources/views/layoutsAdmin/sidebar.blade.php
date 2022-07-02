            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">
                <a href="#" class="intro-x flex items-center pl-5 pt-4 mt-3">
                    <img style ="width: 60px; clip-path: circle();" class="" src="{{ asset('uploads/user/'.Auth::user()->avatar) }}">
                    <span class="hidden xl:block text-white text-lg ml-3"> {{Auth::user()->name}} </span> 
                </a>
                <div class="side-nav__devider my-6"></div>
                <ul>
                    <li>
                        <a href="{{route('home')}}" class="side-menu side-menu--active">
                            <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                            <div class="side-menu__title">
                                Trang chủ 
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;.html" class="side-menu side-menu">
                            <div class="side-menu__icon"> <i data-lucide="layout-dashboard"></i> </div>
                            <div class="side-menu__title">
                                Thống kê 
                            </div>
                        </a>
                    </li>
                    <li class="side-nav__devider my-6"></li>
                    <li>
                        <a href="{{ route('member_index') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                            <div class="side-menu__title">
                                Thành viên 
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('novel_index') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="library"></i> </div>
                            <div class="side-menu__title">
                                Truyện
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('typenovel_index') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="clipboard"></i> </div>
                            <div class="side-menu__title">
                                Loại truyện
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category_index') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="clipboard-list"></i> </div>
                            <div class="side-menu__title">
                                Thể loại 
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('topic_index') }}" class="side-menu">
                            <div class="side-menu__icon"> <i data-lucide="send"></i> </div>
                            <div class="side-menu__title">
                                Bài viết
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- END: Side Menu -->