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
    {{-- @if(Session::has('id_tk'))
    <a href="{{ url('xulydangxuatdd') }}" class="nav-link">
        <p style="color: ghostwhite">Đăng xuất</p>
    </a>
    @else --}}
    <h2>Đăng Nhập Vào Diễn Đàn</h2>
    {{-- @endif --}}

    @if(count($errors)>0)
        <div class="alert alert-danger">
            @foreach ($errors->all() as $err)
            {{$err}}
            @endforeach
        </div>
    @endif

    <?php
    $dangnhap = Session::get('dangnhap');
    if($dangnhap){
        echo '<span class="text-alert">'.$dangnhap.'</span>';
        Session::put('dangnhap',null);
    }

    ?>
    {{-- @if(Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
    @endif --}}
    {{-- @if(Session::has('id_tk'))
    <div class="alert alert-success">Đăng xuất</div>
    @else --}}

        <form action="{{URL::to('/xulydangnhapdd')}}" method="post">
            {{ csrf_field()}}
            <input type="text" class="ggg" name="email" placeholder="E-MAIL" required="">
            <input type="text" class="ggg" name="sodienthoai" placeholder="SỐ ĐIỆN THOẠI" required="">
            <input type="password" class="ggg" name="password" placeholder="MẬT KHẨU" required="">
            <select class="form-control input-lg m-bot15 ggg" name="diendan">
                <option value="Chợ Tốt">Chợ Tốt</option>
                <option value="Facebook">Facebook</option>
                <option value="24h Quảng Cáo">24h Quảng Cáo</option>
                <option value="Nhật Tảo">Nhật Tảo</option>
                <option value="Mua Rẻ">Mua Rẻ</option>
                 {{-- @foreach ($abc as $key => $dd)
                  <option name="id_dd" value="{{$dd->id_dd}}">{{$dd->tendiendan}}</option>
                @endforeach --}}
            </select>
			{{-- <span><input type="checkbox" />Nhớ đăng nhập</span> --}}
			{{-- <h6><a href="#">Quên mật khẩu?</a></h6> --}}
				<div class="clearfix"></div>
				<input type="submit" value="Đăng Nhập" name="login">
        </form>
        {{-- @endif --}}
		{{-- <p>Don't Have an Account ?<a href="registration.html">Create an account</a></p> --}}
</div>
</div>

</body>
</html>
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
</script>
@endsection
