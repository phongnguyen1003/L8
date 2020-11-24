<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Models\danhmuc;

session_start();

class BaiVietController extends Controller
{
    public function taobaiviet(){
        return view('pages.taobaiviet');
    }

    public function suabaiviet(){
        return view('pages.suabaiviet');
    }

    public function qlbaiviet(){
        return view('pages.qlbaiviet');
    }

    public function luubaiviet(Request $request){
        $dm=DB::table('danhmuc')->where('tendanhmuc','Dịch vụ, du lịch')->first();
        $lt=DB::table('loaitin')->where('tenloaitin','Cần bán')->first();
        $qm=DB::table('quymo')->where('tenquymo','Cá nhân')->first();
        $ht=DB::table('hinhthucgh')->where('tenhinhthuc','Không giao hàng')->first();
        $ha=DB::table('hinhanh')->where('tenhinh',$request->hinhanh)->first();

        $data = array();
        $data['tenbaiviet']= $request->tenbaiviet;
        $data['tieude']= $request->tieude;
        $data['noidung']= $request->noidung;
        $data['giaban']= $request->giaban;
        $data['id_tk']= Session::get('id_tk');
        $data['id_dm']= $dm->id_dm;
        $data['id_lt']= $lt->id_lt;
        $data['id_qm']= $qm->id_qm;
        $data['id_ht']= $ht->id_ht;
        $data['id_ha']= $ha->id_ha;

        DB::table('baiviet')->insert($data);
        Session::put('message','Thêm bài viết thành công');
        return Redirect::to('taobaiviet');

    }


}
