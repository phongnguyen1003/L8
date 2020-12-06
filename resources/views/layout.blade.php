<!DOCTYPE html>

<head>
    <title>Thùy Linh</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <!-- bootstrap-css -->

    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- //bootstrap-css -->

    <!-- Custom CSS -->
    <link href="{{ asset('backend/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('backend/css/style-responsive.css') }}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ asset('backend/css/font.css') }}" type="text/css" />
    <link href="{{ asset('backend/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/morris.css') }}" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="{{ asset('backend/css/monthly.css') }}">
    <!-- //calendar -->
    <!-- //font-awesome icons -->

    <script src="{{ asset('backend/js/jquery2.0.3.min.js') }}"></script>
    <script src="{{ asset('backend/js/raphael-min.js') }}"></script>
    <script src="{{ asset('backend/js/morris.js') }}"></script>
</head>

<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="" class="logo">
                    Thùy Linh
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->

            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            {{-- <img alt="" src="{{ asset('backend/images/linh1.jpg') }}"
                            style="width: 30px; height: 30px; border-radius: 50%"> --}}
                            <span class="username">
                                Hello,
                                <?php
                                    $name = Session::get('hoten_nd');
                                    if($name){
                                        echo $name;
                                    }

                                ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="{{URL::to('/dangxuat')}}"><i class="fa fa-key"></i> Đăng Xuất</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->

                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{ URL::to('/trangchu') }}">
                                <i class="fa fa-home"></i>
                                <span>Home</span>
                            </a>
                        </li>

                        @if(Session::has('id_tk'))
                        <li>
                            <a href="{{ URL::to('/dangxuatdd') }}">
                                <i class="fa fa-check-square"></i>
                                <span>Đăng xuất trên diễn đàn </span>
                            </a>
                        </li>
                        @else
                        <li>
                            <a href="{{ URL::to('/dangnhapdd') }}">
                                <i class="fa fa-check-square"></i>
                                <span>Đăng nhập trên diễn đàn </span>
                            </a>
                        </li>
                        @endif


                        <li>
                            <a href="{{ URL::to('/taobaiviet') }}">
                                <i class="fa fa-plus-circle"></i>
                                <span>Tạo bài viết</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ URL::to('/dangbai') }}">
                                <i class="fa fa-upload"></i>
                                <span>Đăng bài lên diễn đàn </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ URL::to('/qlbaiviet') }}">
                                <i class="fa fa-briefcase"></i>
                                <span>Quản lý bài viết </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ URL::to('/dangkydd') }}">
                                <i class="fa fa-plus-circle"></i>
                                <span>Tạo tài khoản trên diễn đàn </span>
                            </a>
                        </li>



                        <li>
                            <a href="{{ URL::to('/suabaiviet') }}">
                                <i class="fa fa-edit"></i>
                                <span>Cập nhật bài đăng</span>
                            </a>
                        </li>
                        {{-- <li class="sub-menu">
                            <a href="">
                                <i class="fa fa-th"></i>
                                <span>Quản lý</span>
                            </a>
                            <ul class="sub">
                                <li><a href="">Đo hiệu quả quảng cáo</a></li>
                                <li><a href="">Lập lịch</a></li>
                            </ul>
                        </li> --}}
                        <li>
                            <a href="">
                                <i class="fa fa-edit"></i>
                                <span>Đo hiệu quả quảng cáo</span>
                            </a>
                        </li>

                        <li>
                            <a href="">
                                <i class="fa fa-hourglass-end"></i>
                                <span>Lập lịch tự động</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('/info') }}">
                                <i class="fa fa-user"></i>
                                <span>Hồ sơ cá nhân</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <div class="row home_logo">
                    @yield('content_home')
                </div>
                @yield('content_login')
                @yield('content_dangky')
                @yield('content_dangbai')
                @yield('content_qlbaiviet')
                @yield('content_suabai')
                @yield('content_info')

            </section>
            <!-- footer -->
            <div class="footer">
                <div class="wthree-copyright">
                    <p>Đồ án tốt nghiệp đại học năm 2020 | Design by <a href="">Lê Thị Thùy Linh</a></p>
                </div>
            </div>
            <!-- / footer -->
        </section>
        <!--main content end-->
    </section>
    <script src="{{ asset('backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('backend/js/scripts.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.nicescroll.js') }}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="js/jquery.scrollTo.js"></script>
    <!-- morris JavaScript -->
</body>

</html>