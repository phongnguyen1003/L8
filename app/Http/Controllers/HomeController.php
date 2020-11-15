<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Routing\Redirector;


class HomeController extends Controller
{
    public function home(){
        return view('pages.home');
    }
    public function login(){
        return view('pages.login');
    }

    public function dangnhap(){
        return view('pages.dangnhap');
    }

    public function xulydangnhap(Request $request){
        $email = $request->Email;
        $pass = $request->Password;

        $result = DB::table('nguoidung')->where('email_nd',$email)->where('matkhau_nd',$pass)->first();
        if($result){
            return redirect()->action([HomeController::class, 'home']);

        }else {
            return redirect()->back();
        }

        // return view('pages.home');
    }
    public function layout(){
        return view('layout');
    }
    public function dangky(){
        return view('pages.dangky');
    }
    public function dangbai(){
        return view('pages.dangbai');
    }
    public function suabaiviet(){
        return view('pages.suabaiviet');
    }
}
