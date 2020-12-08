@extends('layout')
@section('content_dstaikhoandd')
<!DOCTYPE html>

<head>
    <title>Danh sách tài khoản
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
                            DANH SÁCH TÀI KHOẢN CÁC DIỄN ĐÀN
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
                               <thead style="text-align: center">
                                        <tr>
                                            <th data-breakpoints="xs">ID</th>
                                            <th>Họ Tên</th>
                                            <th data-breakpoints="xs">Tên Đăng Nhập</th>
                                            <th>Email</th>
                                            <th>Số Điện Thoại</th>
                                            <th>Mật Khẩu</th>
                                            <th>Diễn Đàn Đăng Ký</th>
                                            {{-- <th data-breakpoints="xs sm md">Đăng Bài</th> --}}
                                        </tr>
                                    </thead>
                                <tbody style="text-align: center">
                                    @foreach ($all_taikhoandd as $key => $tkdd)

                                    <tr data-expanded="true">
                                        <td>{{$tkdd->id_tk}}</td>
                                        <td>{{$tkdd->hoten}}</td>
                                        <td>{{$tkdd->tendangnhap}}</td>
                                        <td>{{$tkdd->email}}</td>
                                        <td>{{$tkdd->sodienthoai}}</td>
                                        <td>{{$tkdd->matkhau}}</td>
                                        <td>{{$tkdd->tendiendan}}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <button class="btn btn-info" style="margin-left: 450px;"><a class="text-white" href="{{URL::to('/taobaiviet')}}">THÊM BÀI VIẾT</a></button> --}}

                </div>
            </section>

        </section>

        <!--main content end-->
    </section>
</body>

</html>

@endsection
