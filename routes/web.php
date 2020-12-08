<?php

use App\Http\Controllers\DBQuangCao;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//DATABASE
Route::get('/dbquangcao', [DBQuangCao::class, 'lquangcao']);		//CÁCH VIẾT MỚI

//TRANG CHỦ
Route::get('/trangchu','App\Http\Controllers\HomeController@home');
Route::get('/layout','App\Http\Controllers\HomeController@layout');

// XỬ LÝ CỦA ỨNG DỤNG
Route::get('/dangnhap','App\Http\Controllers\HomeController@dangnhap');
Route::post('/xulydangnhap','App\Http\Controllers\HomeController@xulydangnhap');

Route::get('/dangky','App\Http\Controllers\HomeController@dangky');
Route::post('/xulydangky','App\Http\Controllers\HomeController@xulydangky');

Route::get('/dangxuat','App\Http\Controllers\HomeController@dangxuat');

Route::get('/info','App\Http\Controllers\HomeController@Info');
Route::post('/updateInfo','App\Http\Controllers\HomeController@updateInfo');

Route::get('/doimatkhau','App\Http\Controllers\HomeController@doimatkhau');
Route::post('/updatematkhau','App\Http\Controllers\HomeController@updatematkhau');


//XỬ LÝ CỦA DIỄN ĐÀN
Route::get('/dangkydd','App\Http\Controllers\HomeController@dangkydd');
Route::get('/dangnhapdd','App\Http\Controllers\HomeController@dangnhapdd');
Route::post('/xulydangkydd','App\Http\Controllers\HomeController@xulydangkydd');
Route::post('/xulydangnhapdd','App\Http\Controllers\HomeController@xulydangnhapdd');
// Route::get('/dangxuatdd','App\Http\Controllers\HomeController@dangxuatdd');
Route::get('/xulydangxuatdd','App\Http\Controllers\HomeController@xulydangxuatdd');

Route::get('/dstaikhoandd','App\Http\Controllers\HomeController@dstaikhoandd');




// Route::get('/dangbai','App\Http\Controllers\HomeController@dangbai');
Route::get('/taobaiviet','App\Http\Controllers\BaiVietController@taobaiviet');
Route::get('/qlbaiviet','App\Http\Controllers\BaiVietController@qlbaiviet');
Route::post('/luubaiviet','App\Http\Controllers\BaiVietController@luubaiviet');
Route::get('/suabaiviet/{id_bv}','App\Http\Controllers\BaiVietController@suabaiviet');
Route::get('/xoabaiviet/{id_bv}','App\Http\Controllers\BaiVietController@xoabaiviet');
Route::post('/update_bv/{id_bv}','App\Http\Controllers\BaiVietController@update_bv');
Route::get('/dangbai','App\Http\Controllers\BaiVietController@dangbai');
Route::get('/dangbaidd/{id_bv}','App\Http\Controllers\BaiVietController@dangbaidd');


// Route::get('/xulydiendan','App\Http\Controllers\DienDanController@xulydiendan');


//sao không thấy màn hình của Firefox, tuy rằng có hiện ra kết quả chạy
// Route::get('/run_cmd', function () {
//     //cách gọi 1 command line 1a: trực tiếp,
//    $process = new Process(['php','artisan','dusk']
//                        ,'C:\xampp\htdocs\Laravel_8.0.3\L8');             //folder để chạy 1 process

//    //cách gọi 1 command line 1b: dùng file .bat  //nội dung file "run-dusk.bat" là: php artisan dusk
// //    $process = new Process(['run-dusk.bat'],'C:\xampp\htdocs\Laravel_8.0.3\L8');

//     //$process->setPTY(true); 			//chưa kiểm tra
//    $process->run();

//     //bắt lỗi, hiện error
//     if (!$process->isSuccessful()) {
//         throw new ProcessFailedException($process);
//     }

//     //hiện output, html tag '<pre>' để hiện text "xuống hàng" đẹp //text thiếu 0D hoặc 0A
//     echo '<pre>'.$process->getOutput();

// });//end Route::get('/',

// Route::get('/run_cmd', 'App\Http\Controllers\HomeController@runcmd');//end Route::get('/',
