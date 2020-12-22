@extends('layout')
@section('content_laplich')
    <!DOCTYPE html>

    <head>
        <title>Lịch tự động
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
                               DANH SÁCH BÀI VIẾT
                            </div>

                            <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }

                            ?>
                            <form style="margin-bottom: 20px;float: right; margin-right: 50px;margin-top: 20px;width: 30%;" action="{{URL::to('laplichtd')}}" method="POST">
                                {{csrf_field()}}
                                <input style="background: #c9302c; border: none;  box-shadow: none;" type="text" name="id_submit" class="form-control" placeholder="Nhập ID bài viết muốn đặt lịch">
                            </form>
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
                                    <thead style="text-align: center">
                                        <tr>
                                            <th data-breakpoints="xs">ID</th>
                                            <th>Tên Bài Viết</th>
                                            <th data-breakpoints="xs">Tiêu Đề Bài Viết</th>
                                            <th style="width: 60%;">Nội Dung Bài Viết</th>


                                        </tr>
                                    </thead>
                                    <tbody style="text-align: center">
                                       @foreach ($dsbaiviet as $key => $dsbaiviet)

                                        <tr data-expanded="true">
                                            <td>{{$dsbaiviet->id_bv}}</td>
                                            <td>{{$dsbaiviet->tenbaiviet}}</td>
                                            <td>{{$dsbaiviet->tieude}}</td>
                                            <td style="text-align: justify">{{$dsbaiviet->noidung}}</td>


                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>


                    </div>
                </section>

            </section>

            <!--main content end-->
        </section>
    </body>

    </html>

@endsection
