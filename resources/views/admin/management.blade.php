<!DOCTYPE html>
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        @include('layoutsAdmin.header')
        <title> @yield('title') - {{ "Shino Novel" }} </title>
    </head>
    <!-- END: Head -->
    <body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
        <div class="flex overflow-hidden">
            @include('layoutsAdmin.sidebar')
            <!-- BEGIN: Content -->
            <div class="content">
                @include('layoutsAdmin.topbar')
                @yield('content')
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>
                                    {{ $novel_views }}
                                </h3>
                                <p>Tổng lượt xem</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-eye"></i>                            
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>
                                    {{ $novel }}
                                </h3>
                                <p>Tổng số truyện</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-book"></i>                            
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                            <h3>
                                    {{ $chapter }}
                                </h3>
                                <p>Tổng số chương truyện</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-copy"></i>                 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                            <h3>
                                    {{ $report }}
                                </h3>
                                <p>Tổng số báo cáo</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-flag"></i>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Content -->
        </div>
        @include('layoutsAdmin.footer')
    </body>
</html>