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
Route::get('/dbquangcao', [DBQuangCao::class, 'lquangcao']);		//CÁCH VIẾT MỚI


Route::get('/trangchu','App\Http\Controllers\HomeController@home');
Route::post('/logintrangchu','App\Http\Controllers\HomeController@xulydangnhap');
Route::get('/dangnhap','App\Http\Controllers\HomeController@dangnhap');
// Route::get('/login','App\Http\Controllers\HomeController@login');
Route::get('/layout','App\Http\Controllers\HomeController@layout');
Route::get('/dangky','App\Http\Controllers\HomeController@dangky');
Route::get('/dangbai','App\Http\Controllers\HomeController@dangbai');
Route::get('/suabaiviet','App\Http\Controllers\HomeController@suabaiviet');


//sao không thấy màn hình của Firefox, tuy rằng có hiện ra kết quả chạy
Route::get('/run_cmd', function () {
    //cách gọi 1 command line 1a: trực tiếp,
   $process = new Process(['php','artisan','dusk']
                       ,'C:\xampp\htdocs\Laravel_8.0.3\L8');             //folder để chạy 1 process

   //cách gọi 1 command line 1b: dùng file .bat  //nội dung file "run-dusk.bat" là: php artisan dusk
//    $process = new Process(['run-dusk.bat'],'C:\xampp\htdocs\Laravel_8.0.3\L8');

    //$process->setPTY(true); 			//chưa kiểm tra
   $process->run();

    //bắt lỗi, hiện error
    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }

    //hiện output, html tag '<pre>' để hiện text "xuống hàng" đẹp //text thiếu 0D hoặc 0A
    echo '<pre>'.$process->getOutput();

});//end Route::get('/',
