<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.header')
        <title> @yield('title') - {{ "Shino Novel" }} </title>
    </head>
    <body>
        <section class="main_all">
            <!------------Navbar------------------>
            @include('layouts.navbar')
            <!-------------Trang Cá Nhân------------------>
            @yield('member')
            <div class="container-fluid" id="main">

                <!---------------------Slide------------------------->
                @yield('slide')
                <!---------------Bài viết--------------->
                @yield('topic')
                <!------------Chương Mới Nhất------------------->
                <!-- ('novel_new_chapter) -->
                <!------------Truyện Mới Nhất------------------->
                @yield('content')
                <!---------Truyện Đã Hoàn Thành----------------->
                @yield('completed')
            </div>
                <!-------------Footer------------->
                @include('layouts.footer')
        </section>




    </body>
</html>


