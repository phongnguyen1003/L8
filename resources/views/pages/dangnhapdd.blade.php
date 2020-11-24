@extends('layout')
@section('content_login')

<!DOCTYPE html>
<head>
<title>Login</title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

</head>
<body>
<div class="log-w3">
<div class="w3layouts-main" style="width: 40%;">
    <h2>Đăng Nhập Vào Diễn Đàn</h2>
    <?php
    $message = Session::get('message');
    if($message){
        echo '<span class="text-alert">'.$message.'</span>';
        Session::put('message',null);
    }

?>
        <form action="{{URL::to('/xulydangnhapdd')}}" method="post">
            {{ csrf_field()}}
            <input type="text" class="ggg" name="email" placeholder="E-MAIL/SỐ ĐIỆN THOẠI" required="">
            <input type="password" class="ggg" name="password" placeholder="MẬT KHẨU" required="">
            <select class="form-control input-lg m-bot15 ggg" name="diendan">
                <option value="Chợ Tốt">Chợ Tốt</option>
                <option value="Facebook">Facebook</option>
                <option value="24h Quảng Cáo">24h Quảng Cáo</option>
            </select>
			{{-- <span><input type="checkbox" />Nhớ đăng nhập</span> --}}
			<h6><a href="#">Quên mật khẩu?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="Đăng Nhập" name="login">
		</form>
		{{-- <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p> --}}
</div>
</div>

</body>
</html>

@endsection
