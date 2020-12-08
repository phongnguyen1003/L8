@extends('layout')
@section('content_dangky')

<!DOCTYPE html>
<head>
<title>Đăng ký diễn đàn</title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

</head>
<body>
<div class="log-w3">
<div class="w3layouts-main" style="width: 50%;">
    <h2>Đăng Ký Tài Khoản Diễn Đàn</h2>
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
    <form action="{{URL::to('/xulydangkydd')}}" method="post">
        {{ csrf_field()}}
        <input type="text" class="ggg" name="hoten" placeholder="HỌ TÊN" required="">
        <input type="text" class="ggg" name="email" placeholder="E-MAIL" required="">
        <input type="text" class="ggg" name="sodienthoai" placeholder="SỐ ĐIỆN THOẠI" required="">
        <input type="text" class="ggg" name="tendangnhap" placeholder="TÊN ĐĂNG NHẬP" required="">
        <input type="password" class="ggg" name="password" placeholder="MẬT KHẨU" required="">
        <input type="password" class="ggg" name="password_confirm" placeholder="NHẬP LẠI MẬT KHẨU" required="">
        <div class="date" style="display: flex;">
            <input style="margin-right: 10px" type="text" class="ggg" name="ngaysinh" placeholder="NGÀY SINH" required="">
            <input style="margin-right: 10px" type="text" class="ggg" name="thangsinh" placeholder="THÁNG SINH" required="">
            <input type="text" class="ggg" name="namsinh" placeholder="NĂM SINH" required="">
        </div>
        {{-- <input type="text" class="ggg" name="diachi" placeholder="ĐỊA CHỈ" required="">
        <input type="text" class="ggg" name="phuong" placeholder="PHƯỜNG/XÃ" required="">
        <input type="text" class="ggg" name="quan" placeholder="QUẬN/HUYỆN" required="">
        <input type="text" class="ggg" name="tinh" placeholder="TỈNH/THÀNH PHỐ" required=""> --}}
        <select class="form-control input-lg m-bot15 ggg" name="diendan">
            <option value="Chợ Tốt">Chợ Tốt</option>
            <option value="Facebook">Facebook</option>
            <option value="24h Quảng Cáo">24h Quảng Cáo</option>
            <option value="Nhật Tảo">Nhật Tảo</option>
            <option value="Mua Rẻ">Mua Rẻ</option>
        </select>
            <div class="clearfix"></div>
            <input type="submit" value="Đăng ký" name="dangky">
    </form>
		{{-- <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p> --}}
</div>
</div>

</body>
</html>

@endsection
