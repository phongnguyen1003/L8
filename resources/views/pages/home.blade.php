@extends('layout')
@section('content_home')
    <!doctype html>
    <html lang="en">

    <head>
        <title>Trang Chủ</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ 'backend/css/home.css' }}" rel='stylesheet' type='text/css' />


    </head>

    <body>
        <?php
        $capnhatbv = Session::get('capnhatbaidang');
        if($capnhatbv){
            echo '<span class="text-alert alert">'.$capnhatbv.'</span>';
            Session::put('capnhatbaidang',null);
        }

        ?>

            <div class="col-4 home__logo--items">

                <a href="{{ URL::to('/dangbai') }}">
                    <img alt="" src="{{ asset('backend/images/Chotot-Logo-480x297.png') }}">
                </a>
            </div>
            <div class="col-4 home__logo--items">
                <a href="{{ URL::to('/dangbai') }}">
                    <img alt="" src="{{ asset('backend/images/images.jpg') }}">
                </a>
            </div>
            <div class="col-4 home__logo--items">
                <a href="{{ URL::to('/dangbai') }}">
                    <img alt="" src="{{ asset('backend/images/tải xuống.jpg') }}">
                </a>
            </div>

            <div class="col-4 home__logo--items">
                <a href="{{ URL::to('/dangbai') }}">
                    <img alt="" src="{{ asset('backend/images/logo-rao-vat-net.png') }}">
                </a>
            </div><div class="col-4 home__logo--items">
                <a href="{{ URL::to('/dangbai') }}">
                    <img alt="" src="{{ asset('backend/images/24hquangcao.PNG') }}">
                </a>
            </div><div class="col-4 home__logo--items">
                <a href="{{ URL::to('/dangbai') }}">
                    <img alt="" src="{{ asset('backend/images/nhattao.png') }}">
                </a>
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
