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
        <div class="col-4 home__logo--items">
            <a href="">
                <img alt="" src="{{ asset('backend/images/Chotot-Logo-480x297.png') }}">
            </a>
        </div>
        <div class="col-4 home__logo--items">
            <a href="">
                <img alt="" src="{{ asset('backend/images/images.jpg') }}">
            </a>
        </div>
        <div class="col-4 home__logo--items">
            <a href="">
                <img alt="" src="{{ asset('backend/images/tải xuống.jpg') }}">
            </a>
        </div>
        <div class="col-4 home__logo--items">
            <a href="">
                <img alt="" src="{{ asset('backend/images/logo-rao-vat-net.png') }}">
            </a>
        </div><div class="col-4 home__logo--items">
            <a href="">
                <img alt="" src="{{ asset('backend/images/unnamed (1).jpg') }}">
            </a>
        </div><div class="col-4 home__logo--items">
            <a href="">
                <img alt="" src="{{ asset('backend/images/YouTube-Face-Blur-Tool.jpg') }}">
            </a>
        </div>


    </body>

    </html>
@endsection
