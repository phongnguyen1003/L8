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

                @foreach ($ttnd as $key=>$tt)

                <div class="position-center">
                <form role="form" method="post" action="{{URL::to('/updateInfo')}}">
                     {{ csrf_field() }}
                        <div class="form-group">
                            <label>Họ Tên:</label>
                            <input type="text" class="form-control" name="hoten" value="{{$tt->hoten_nd}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email:</label>
                            <input disabled type="text" class="form-control" name="email" value="{{$tt->email_nd}}">
                        </div>
                        <div class="form-group">
                            <label>Số Điện Thoại:</label>
                            <input type="text" class="form-control" name="sdt" value="{{$tt->sdt_nd}}">
                        </div>

                        <button type="submit" class="btn btn-info">CẬP NHẬT</button>
                    </form>
                </div>
                @endforeach

            </div>
        </section>
    </body>

    </html>
@endsection
