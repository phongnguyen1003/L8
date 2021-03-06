<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class DBQuangCao extends Controller
{
    public function lquangcao(){

        Schema::create('NguoiDung', function ($table) {
            $table->increments('id_nd');
            $table->string('hoten_nd', 50);
            $table->string('email_nd', 50)->unique();
            $table->string('sdt_nd', 10)->unique();
            $table->text('matkhau_nd');
           // $table->string('matkhau_nd', 50);
            $table->timestamps();
        });

        // Schema::create('DienDan', function ($table) {
        //     $table->increments('id_dd');
        //     $table->string('tendiendan', 50);
        //     $table->timestamps();
        // });


        Schema::create('TaiKhoanDD', function ($table) {
            $table->increments('id_tk');
            $table->string('hoten', 50);
            $table->string('tendangnhap', 50);
            $table->string('email', 50);
            $table->string('sodienthoai', 10);
            $table->text('matkhau');
            $table->string('ngaysinh', 10);
            $table->string('thangsinh', 10);
            $table->string('namsinh', 10);
            $table->string('gioitinh', 10);
            // $table->string('diachi',100);
            // $table->string('phuong', 50);
            // $table->string('quan', 50);
            // $table->string('tinh', 50);
            $table->string('tendiendan', 50);
            // $table->integer('id_dd')->unsigned();
            // $table->foreign('id_dd')->references('id_dd')->on('DienDan');
            $table->integer('id_nd')->unsigned();
            $table->foreign('id_nd')->references('id_nd')->on('NguoiDung');
            $table->timestamps();
        });

        Schema::create('DanhMuc', function ($table) {
            $table->increments('id_dm');
            $table->string('tendanhmuc', 50);
            $table->timestamps();
        });

        Schema::create('CTDanhMuc', function ($table) {
            $table->increments('id_ctdm');
            $table->string('tenlinhvuc', 50);
            $table->integer('id_dm')->unsigned();
            $table->foreign('id_dm')->references('id_dm')->on('DanhMuc');
            $table->timestamps();
        });


        Schema::create('LoaiTin', function ($table) {
            $table->increments('id_lt');
            $table->string('tenloaitin', 50);
            $table->timestamps();
        });

        Schema::create('QuyMo', function ($table) {
            $table->increments('id_qm');
            $table->string('tenquymo', 50);
            $table->timestamps();
        });

        Schema::create('HinhThucGH', function ($table) {
            $table->increments('id_ht');
            $table->string('tenhinhthuc', 50);
            $table->timestamps();
        });

        Schema::create('HinhAnh', function ($table) {
            $table->increments('id_ha');
            $table->string('tenhinh', 50);
            $table->string('url', 100);
            // $table->integer('id_bv')->unsigned();
            // $table->foreign('id_bv')->references('id_bv')->on('BaiViet');
            $table->timestamps();
        });

        Schema::create('BaiViet', function ($table) {
            $table->increments('id_bv');
            $table->string('tenbaiviet', 50);
            $table->string('tieude', 50);
            $table->string('noidung', 1500);
            $table->integer('giaban');
            $table->integer('id_nd')->unsigned();
            $table->foreign('id_nd')->references('id_nd')->on('NguoiDung');
            $table->integer('id_dm')->unsigned();
            $table->foreign('id_dm')->references('id_dm')->on('DanhMuc');
            $table->integer('id_lt')->unsigned();
            $table->foreign('id_lt')->references('id_lt')->on('LoaiTin');
            $table->integer('id_qm')->unsigned();
            $table->foreign('id_qm')->references('id_qm')->on('QuyMo');
            $table->integer('id_ht')->unsigned();
            $table->foreign('id_ht')->references('id_ht')->on('HinhThucGH');
            $table->integer('id_ha')->unsigned();
            $table->foreign('id_ha')->references('id_ha')->on('HinhAnh');
            $table->timestamps();
        });


        Schema::create('ChiTietBaiViet', function ($table) {
            // $table->increments('id');
            $table->integer('id_bv')->unsigned();
            $table->integer('id_tk')->unsigned();
            $table->timestamps();
        });


        //tao bảng tạm
        Schema::create('luudangnhapdd', function ($table) {
            $table->increments('id');
            $table->integer('id_tk')->nullable();;
            $table->integer('id_baidang')->nullable();
            $table->timestamps();
        });

    	echo "tạo bảng thành công ";

    }
}
