@extends('layout')
@section('content_dangbai')
<!DOCTYPE html>

<head>
    <title>Đăng bài
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
                    @if (Session::has('thanhcong'))
                        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                    @endif
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            ĐĂNG BÀI VIẾT
                        </div>
                        {{-- <div class="input-group" style="margin-bottom: 20px;width: 20%;float: right; margin-right: 90px;margin-top: 20px;">
                            <input type="text" class="input-sm form-control" placeholder="Tìm kiếm tên bài viết">

                          </div> --}}
                          <form style="margin-bottom: 20px;float: right; margin-right: 50px;margin-top: 20px;" action="{{URL::to('timkiem')}}" method="POST">
                            {{csrf_field()}}

                                <input style="background: #c9302c; border: none;  box-shadow: none;" type="text" name="keywords_submit" class="form-control" placeholder="Tìm kiếm bài viết">

                        </form>
                        <?php
                        $dangbai = Session::get('dangbai');
                        if($dangbai){
                            echo '<span class="text-alert">'.$dangbai.'</span>';
                            Session::put('dangbai',null);
                        }
                        ?>
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
                                            <th style="width: 35%;">Nội Dung Bài Viết</th>
                                            <th>Diễn Đàn</th>
                                            <th data-breakpoints="xs sm md">Đăng Bài</th>
                                        </tr>
                                    </thead>
                                <tbody style="text-align: center">
                                    @foreach ($all_baiviet as $key => $baiviet)

                                    <tr data-expanded="true">
                                        <td>{{$baiviet->id_bv}}</td>
                                        <td>{{$baiviet->tenbaiviet}}</td>
                                        <td>{{$baiviet->tieude}}</td>
                                        <td style="text-align: justify">{{$baiviet->noidung}}</td>
                                        <td> {{Session::get('diendan')}} </td>

                                         {{-- <td>
                                            <select style="margin-left: 5px" class="form-control" name="diendan">
                                                <option value="Chợ Tốt">Chợ Tốt</option>
                                                <option value="Facebook">Facebook</option>
                                                <option value="24h Quảng Cáo">24h Quảng Cáo</option>

                                                @foreach ($abc as $key => $dd)
                                                  <option name="id_dd" value="{{$dd->id_dd}}">{{$dd->tendiendan}}</option>
                                                @endforeach
                                            </select>
                                        </td> --}}
                                        <td>
                                            <button class="btn btn-danger" style="margin-left: 15px">
                                                <a class="text-white" href="{{URL::to('/dangbaidd/'.$baiviet->id_bv)}}">
                                                    Đăng Bài
                                                </a>
                                            </button>
                                        </td>
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
