@extends('layout')
@section('content_info')
<!doctype html>
<html lang="en">

<head>
    <title>Tạo bài viết</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>

<body>
    <section class="panel">
        <header class="panel-heading">
            THÔNG TIN NGƯỜI DÙNG
        </header>
        <div class="panel-body">
            <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
            @if(Session::has('thanhcong'))
            <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
            @endif
            <div class="position-center">
                <form role="form" method="post" action="{{URL::to('/updatematkhau')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Mật khẩu cũ</label>
                        <input type="password" class="form-control" name="oldPass">
                        @error('oldPass')
                        <p>{{ $message }}</p>
                        @enderror
                    </div>
                    <div class=" form-group">
                        <label for="exampleInputEmail1">Mật khẩu mới:</label>
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" required
                            autocomplete="new-password" placeholder="Enter password" name="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class=" form-group">
                        <label>Xác nhận mật khẩu mới</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Confirm Password">
                    </div>

                    <button type=" submit" class="btn btn-info">CẬP NHẬT</button>
                </form>
            </div>

        </div>
    </section>
</body>

</html>
@endsection