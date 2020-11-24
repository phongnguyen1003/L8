<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Đăng ký</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{('backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{('backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{('backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{('backend/css/font.css')}}" type="text/css"/>
<link href="{{('backend/css/font-awesome.css')}}" rel="stylesheet">
<!-- //font-awesome icons -->
<script src="{{('backend/js/jquery2.0.3.min.js')}}"></script>
</head>
<body>
<div class="reg-w3">
<div class="w3layouts-main" style="width: 35%;">
    <h2>Đăng ký tài khoản</h2>

    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $err)
            {{$err}}
            @endforeach
        </div>
    @endif

    @if(Session::has('thanhcong'))
        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
    @endif

		<form  action="{{URL::to('/xulydangky')}}" method="post">
            {{ csrf_field() }}
            <input type="text" class="ggg" name="Name" placeholder="HỌ TÊN" required="">
			<input type="email" class="ggg" name="Email" placeholder="EMAIL" required="">
			<input type="text" class="ggg" name="Phone" placeholder="SỐ ĐIỆN THOẠI" required="">
            <input type="password" class="ggg" name="Password" placeholder="MẬT KHẨU" required="">
			<input type="password" class="ggg" name="Password_confirm" placeholder="NHẬP LẠI MẬT KHẤU" required="">

			<input type="submit" value="Đăng Ký" name="register">
		</form>
		<p>Bạn đã đăng ký?<a href="{{URL::to('/dangnhap')}}">Đăng nhập</a></p>
</div>
</div>
<script src="{{('backend/js/bootstrap.js')}}"></script>
<script src="{{('backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{('backend/js/scripts.js')}}"></script>
<script src="{{('backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{('backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{('backend/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
