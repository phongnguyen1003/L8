@extends('layout')
@section('content_dangbai')
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
                TẠO BÀI VIẾT
            </header>
            <div class="panel-body">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }

                ?>
                <div class="position-center">
                <form role="form" method="post" action="{{URL::to('/luubaiviet')}}">
                     {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên bài viết:</label>
                            <input type="text" class="form-control" name="tenbaiviet">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chọn tỉnh thành:</label>
                            <input type="text" class="form-control" name="tinh" value="<?php echo Session::get('tinh') ?>">
                            {{-- <input type="text" class="form-control" name="tinh" value=""> --}}
                        </div>
                        <div class="form-group">
                            <label>Quận, huyện:</label>
                            <input type="text" class="form-control" class="quan" value="<?php echo Session::get('quan') ?>">
                            {{-- <input type="text" class="form-control" class="quan" value=""> --}}
                        </div>
                        <div class="form-group">
                            <label>Phường, xã, thị trấn:</label>
                            <input type="text" class="form-control" name="phuong" value="<?php echo Session::get('phuong') ?>">
                            {{-- <input type="text" class="form-control" name="phuong" value=""> --}}

                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh sản phẩm:</label>
                            <input type="file" name="hinhanh" id="imgInp">
                            <img id="blah" src="#" alt="your image" style="width: 200px;"/>

                        </div>
                        <div class="form-group">
                            <label>Giá bán:</label>
                            <input type="text" class="form-control" name="giaban">
                        </div>

                        <div class="form-group">
                            <label class="">Tiêu đề:</label>
                            <input type="text" tabindex="1" name="tieude" id="subject" class="form-control">
                        </div>


                        <div class="compose-editor">
                            <label class="">Mô tả chi tiết:</label>
                            <textarea name="noidung" class="wysihtml5 form-control" rows="9"></textarea>
                        </div>
                        <button type="submit" class="btn btn-info">SUBMIT</button>
                    </form>
                </div>

            </div>
        </section>

        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
                }
            }

            $("#imgInp").change(function(){
                readURL(this);
            });
        </script>
    </body>

    </html>
@endsection
