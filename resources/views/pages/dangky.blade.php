@extends('layout')
@section('content_dangky')

<!DOCTYPE html>
<head>
<title>Đăng ký</title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
    <h2>Đăng Ký Tài Khoản</h2>
    <form action="" method="post">
        {{ csrf_field()}}
        <input type="text" class="ggg" name="Hoten" placeholder="HỌ TÊN" required="">
        <input type="text" class="ggg" name="Email" placeholder="E-MAIL/SỐ ĐIỆN THOẠI" required="">
        <input type="password" class="ggg" name="Password" placeholder="MẬT KHẨU" required="">
        <input type="password" class="ggg" name="Password" placeholder="NHẬP LẠI MẬT KHẨU" required="">
        <input type="text" class="ggg" name="Diachi" placeholder="ĐỊA CHỈ" required="">

            <div class="clearfix"></div>
            <input type="submit" value="Đăng ký" name="dangky">
    </form>
		{{-- <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p> --}}
</div>
</div>

</body>
</html>

@endsection
