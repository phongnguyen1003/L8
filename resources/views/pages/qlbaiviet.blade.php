@extends('layout')
@section('content_qlbaiviet')
    <!DOCTYPE html>

    <head>
        <title>Visitors an Admin Panel Category Bootstrap Responsive Website Template | Responsive_table :: w3layouts
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
        Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    </head>

    <body>
        <section id="container">
            <!--main content start-->
            <section id="main-content abcd">
                <section class="wrapper" id="abcde">
                    <div class="table-agile-info">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                QUẢN LÝ BÀI VIẾT
                            </div>
                            <div>
                                <table class="table" ui-jq="footable" ui-options='{
                "paging": {
                  "enabled": true
                },
                "filtering": {
                  "enabled": true
                },
                "sorting": {
                  "enabled": true
                }}'>
                                    <thead>
                                        <tr>
                                            <th data-breakpoints="xs">ID</th>
                                            <th>Tên Bài Viết</th>
                                            <th>Tài Khoản đăng bài</th>
                                            <th data-breakpoints="xs">Tên Diễn Đàn</th>

                                            <th data-breakpoints="xs sm md">Sửa Bài Viết</th>
                                            <th data-breakpoints="xs sm md">Xóa Bài Viết</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr data-expanded="true">
                                            <td>1</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><button class="btn btn-danger" style="margin-left: 15px"><a class="text-white" href="">Sửa</a></button></td>
                                            <td><button class="btn btn-danger" style="margin-left: 15px"><a class="text-white" href="">Xóa</a></button></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button class="btn btn-info" style="margin-left: 450px;"><a class="text-white" href="{{URL::to('/taobaiviet')}}">THÊM BÀI VIẾT</a></button>

                    </div>
                </section>

            </section>

            <!--main content end-->
        </section>
    </body>

    </html>

@endsection
