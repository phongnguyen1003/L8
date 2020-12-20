@extends('layout')
@section('content_capnhatbv')
<!DOCTYPE html>

<head>
    <title>Cập nhật bài viết
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <style>
        .loader {
          border: 16px solid #f3f3f3;
          border-radius: 50%;
          border-top: 16px solid blue;
          border-bottom: 16px solid blue;
          width: 120px;
          height: 120px;
          -webkit-animation: spin 2s linear infinite;
          animation: spin 2s linear infinite;
          margin: 220px auto;
        }

        @-webkit-keyframes spin {
          0% { -webkit-transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
          0% { transform: rotate(0deg); }
          100% { transform: rotate(360deg); }
        }
        </style>
</head>

<body>
    <?php
        $capnhatbv = Session::get('capnhatbaidang');
        if($capnhatbv){
            echo '<span class="text-alert alert">'.$capnhatbv.'</span>';
            Session::put('capnhatbaidang',null);
        }

        ?>
    {{-- <h2>Vui lòng đợi!!!</h2> --}}

    <div class="loader"></div>
</body>

</html>

@endsection
