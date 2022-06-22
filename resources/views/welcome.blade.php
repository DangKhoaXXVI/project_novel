<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.header')
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
                <!---------------Chương Mới Nhất--------------->
                @yield('topic')
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


