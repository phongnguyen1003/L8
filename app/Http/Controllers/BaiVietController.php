<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use App\Models\danhmuc;
use App\Models\hinhanh;

session_start();

class BaiVietController extends Controller
{
    public function taobaiviet(){
        return view('pages.taobaiviet');
    }

    public function suabaiviet($id_bv){
         $sua_baiviet = DB::table('baiviet')->where('id_bv',$id_bv)->get();
         return view('pages.suabaiviet')->with('sua_bv',$sua_baiviet);
       // return view('pages.suabaiviet');
    }

    public function qlbaiviet(){
        $all_baiviet = DB::table('baiviet')->get();
        return view('pages.qlbaiviet')->with('all_baiviet',$all_baiviet);
    }

    public function dangbai(){
        //sửa lại chỉ lấy những bài viết có id==id thằng đang đăng nhập
        $all_baiviet = DB::table('baiviet')->get();
        return view('pages.dangbai')->with('all_baiviet',$all_baiviet);
    }

    public function luuhinhanh(Request $request){
        $gethinhanh = '';
	    if($request->hasFile('hinhanh')){
		//Hàm kiểm tra dữ liệu
		$this->validate($request,
			[
				//Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 2M
				'hinhanh' => 'mimes:jpg,jpeg,png,gif|max:2048',
			],
			[
				//Tùy chỉnh hiển thị thông báo không thõa điều kiện
				'hinhanh.mimes' => 'Chỉ chấp nhận hình với đuôi .jpg .jpeg .png .gif',
				'hinhanh.max' => 'Hình giới hạn dung lượng không quá 2M',
			]
		);

		//Lưu hình ảnh vào thư mục public/upload/hinhthe
		$hinhanh = $request->file('hinhanh');
		$gethinhanh = time().'_'.$hinhanh->getClientOriginalName();
		$destinationPath = public_path('backend/images');
        $hinhanh->move($destinationPath, $gethinhanh);

        //Gán giá trị vào array
        $data = array();
        $data['tenhinh']=$gethinhanh;
        DB::table('hinhanh')->insert($data);
	}

    }

    public function luubaiviet(Request $request){

        $dm=DB::table('danhmuc')->where('tendanhmuc','Dịch vụ, du lịch')->first();
        $lt=DB::table('loaitin')->where('tenloaitin','Cần bán')->first();
        $qm=DB::table('quymo')->where('tenquymo','Cá nhân')->first();
        $ht=DB::table('hinhthucgh')->where('tenhinhthuc','Không giao hàng')->first();
        $ha=DB::table('hinhanh')->where('tenhinh',$request->hinhanh)->first();
       // $ha=DB::table('hinhanh')->get()->last();


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

        // $hinh=new hinhanh();
        // $hinh->tenhinh= $request->hinhanh;
        // $hinh->url=Concat('public/backend/images/'.$request->hinhanh);

        DB::table('baiviet')->insert($data);
        Session::put('message','Thêm bài viết thành công');
        return Redirect::to('qlbaiviet');

    }


    public function update_bv(Request $request, $id_bv){
        $ha=DB::table('hinhanh')->where('tenhinh',$request->hinhanh)->first();

        $data=array();
        $data['tenbaiviet'] = $request->tenbaiviet;
        $data['giaban'] = $request->giaban;
        $data['tieude'] = $request->tieude;
        $data['noidung'] = $request->noidung;
        $data['id_ha'] = $ha->id_ha;

        DB::table('baiviet')->where('id_bv',$id_bv)->update($data);
        Session::put('message','Cập nhật bài viết thành công');
        return Redirect::to('qlbaiviet');
    }

    public function xoabaiviet($id_bv){

        DB::table('baiviet')->where('id_bv',$id_bv)->delete();
        Session::put('message','Xóa bài viết thành công');
        return Redirect::to('qlbaiviet');
    }
}
