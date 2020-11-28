@extends('layout')
@section('content_suabai')
<!doctype html>
    <html lang="en">

    <head>
        <title>Sửa bài viết</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    </head>

    <body>
        <section class="panel">
            <header class="panel-heading">
                CẬP NHẬT BÀI VIẾT
            </header>
            <div class="panel-body">
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }

                ?>
                    @foreach ($sua_bv as $key =>$edit)

                <div class="position-center">

                <form role="form" method="post" action="{{URL::to('/update_bv/'.$edit->id_bv)}}">
                     {{ csrf_field() }}
                        <div class="form-group">
                            <label>Tên bài viết:</label>
                            <input value="{{$edit->tenbaiviet}}" type="text" class="form-control" name="tenbaiviet">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chọn tỉnh thành:</label>
                            <input disabled type="text" class="form-control" name="tinh" value="<?php echo Session::get('tinh') ?>">
                        </div>
                        <div class="form-group">
                            <label>Quận, huyện:</label>
                            <input disabled type="text" class="form-control" class="quan" value="<?php echo Session::get('quan') ?>">
                        </div>
                        <div class="form-group">
                            <label>Phường, xã, thị trấn:</label>
                            <input disabled type="text" class="form-control" name="phuong" value="<?php echo Session::get('phuong') ?>">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh sản phẩm:</label>
                            <input type="file" name="hinhanh" id="imgInp">
                            <img id="blah" src="#" alt="your image" style="width: 200px;"/>

                        </div>
                        <div class="form-group">
                            <label>Giá bán:</label>
                            <input value="{{$edit->giaban}}" type="text" class="form-control" name="giaban">
                        </div>

                        <div class="form-group">
                            <label class="">Tiêu đề:</label>
                            <input value="{{$edit->tieude}}" type="text" tabindex="1" name="tieude" id="subject" class="form-control">
                        </div>


                        <div class="compose-editor">
                            <label class="">Mô tả chi tiết:</label>
                            <textarea  name="noidung" class="wysihtml5 form-control" rows="9">{{$edit->noidung}}</textarea>
                        </div>
                        <button name="update_bv" type="submit" class="btn btn-info">CẬP NHẬT</button>
                    </form>

                </div>
                @endforeach

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
