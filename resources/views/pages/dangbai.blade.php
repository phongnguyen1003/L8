@extends('layout')
@section('content_dangbai')
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  </head>
  <body>
    <section class="panel">
        <header class="panel-heading">
            ĐĂNG BÀI VIẾT
        </header>
        <div class="panel-body">
            <div class="position-center">
                <form role="form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Chọn tỉnh thành:</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Quận, huyện:</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Phường, xã, thị trấn:</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Hình ảnh sản phẩm:</label>
                    <input type="file" id="exampleInputFile">
                    {{-- <p class="help-block">Example block-level help text here.</p> --}}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Giá bán:</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="subject" class="">Tiêu đề:</label>
                    <input type="text" tabindex="1" id="subject" class="form-control">
                </div>

                <div class="compose-editor">
                    <label for="subject" class="">Mô tả chi tiết:</label>
                    <textarea class="wysihtml5 form-control" rows="9"></textarea>
                </div>
                <button type="submit" class="btn btn-info">ĐĂNG BÀI</button>
            </form>
            </div>

        </div>
    </section>
  </body>
</html>
@endsection
