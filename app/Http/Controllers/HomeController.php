<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\nguoidung;
use App\Models\taikhoandd;
use Illuminate\Support\Facades\Hash;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


class HomeController extends Controller
{
    public function home(){
        return view('pages.home');
    }

    public function dangnhapdd(){
        return view('pages.dangnhapdd');
    }


    public function dangnhapdd_auto() {
        //cách gọi 1 command line 1a: trực tiếp,
        $tkdd = taikhoandd::all()->last();

        if($tkdd->tendiendan=="Chợ Tốt"){
            $process = new Process(['php','artisan','dusk','--group=dangnhapct']
            ,'C:\xampp\htdocs\Laravel_8.0.3\L8');
        }
        if($tkdd->tendiendan=="24h Quảng Cáo"){
            $process = new Process(['php','artisan','dusk','--group=dangnhap24hqc']
            ,'C:\xampp\htdocs\Laravel_8.0.3\L8');
        }
        if($tkdd->tendiendan=="Facebook"){
            $process = new Process(['php','artisan','dusk','--group=dangnhapfb']
            ,'C:\xampp\htdocs\Laravel_8.0.3\L8');
        }
                 //folder để chạy 1 process
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

    }

    public function xulydangnhapdd(Request $request){
        $email = $request->email;
        $sodienthoai = $request->sodienthoai;
        $pass = $request->password;
        $diendan = $request->diendan;
        // $tendd = DB::table('diendan')->orderBy('id_dd','desc')->get();

        $result = DB::table('taikhoandd')->where('email',$email)->where('sodienthoai',$sodienthoai)->where('tendiendan',$diendan)->where('matkhau',$pass)->first();

        if($result){
            Session::put('id_tk', $result->id_tk);
            Session::put('tinh', $result->tinh);
            Session::put('phuong', $result->phuong);
            Session::put('quan', $result->quan);
            Session::put('sodt', $result->sodienthoai);

            $this->dangnhapdd_auto();
            return Redirect::to('/trangchu');

            // return redirect()->action([HomeController::class, 'home']);
        }else {
            Session::put('message','Mật khẩu hoặc tài khoản không đúng. Mời nhập lại!');
            return Redirect::to('/dangnhapdd');
           // return redirect()->back();
        }

        //  return view('pages.dangnhapdd')->with('abc',$tendd);
    }



    public function dangkydd(){
        return view('pages.dangkydd');
    }


    public function dangkydd_auto() {
        //cách gọi 1 command line 1a: trực tiếp,
        $tkdd = taikhoandd::all()->last();

        if($tkdd->tendiendan=="Chợ Tốt"){
            $process = new Process(['php','artisan','dusk','--group=dangkyct']
            ,'C:\xampp\htdocs\Laravel_8.0.3\L8');
        }
        if($tkdd->tendiendan=="24h Quảng Cáo"){
            $process = new Process(['php','artisan','dusk','--group=dangky24hqc']
            ,'C:\xampp\htdocs\Laravel_8.0.3\L8');
        }
        if($tkdd->tendiendan=="Facebook"){
            $process = new Process(['php','artisan','dusk','--group=dangkyfb']
            ,'C:\xampp\htdocs\Laravel_8.0.3\L8');
        }
                 //folder để chạy 1 process
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

    }

    public function xulydangkydd(Request $request){

        //chưa bắt đk 1 email, 1 sđt đăng ký đc nhiều diễn đàn.
        //bỏ điều kiện unique của email, sđt thay vào đó là bắt đk trên
        $this->validate($request,
            [
                'hoten'=>'required',
                'email'=>'required|email|unique:taikhoandd,email',
                'tendangnhap'=>'required',
                'sodienthoai'=>'required|unique:taikhoandd,sodienthoai',
                'password'=>'required',
                'password_confirm'=>'required|same:password',
                'diachi'=>'required',
                'phuong'=>'required',
                'quan'=>'required',
                'tinh'=>'required'
            ],
            [
                'email.required'=>'Vui lòng nhập email!',
                'tendangnhap.required'=>'Vui lòng nhập tên đăng nhập!',
                'email.email'=>'Không đúng định dạng email!',
                'email.unique'=>'Email đã có người sử dụng!',
                'password.required'=>'Vui lòng nhập mật khẩu!',
                'password_confirm.same'=>'Mật khẩu không khớp!',
                'sodienthoai.required'=>'Vui lòng nhập số điện thoại!',
                'sodienthoai.unique'=>'Số điện thoại đã có người sử dụng!',
                'diachi.required'=>'Vui lòng nhập địa chỉ!',
                'phuong.required'=>'Vui lòng nhập phường/xã!',
                'quan.required'=>'Vui lòng nhập quận/huyện!',
                'tinh.required'=>'Vui lòng nhập tỉnh/thành phố!',

            ]);

            $id=session::get('id_nd');

            $tk = new taikhoandd();
            $tk->hoten = $request->hoten;
            $tk->email = $request ->email;
            $tk->tendangnhap = $request ->tendangnhap;
            $tk->sodienthoai = $request ->sodienthoai;
            $tk->matkhau = $request->password;
            $tk->diachi = $request->diachi;
            $tk->phuong = $request->phuong;
            $tk->quan = $request->quan;
            $tk->tinh = $request->tinh;
            $tk->tendiendan = $request->diendan;
            // $tk->id_dd = $request->diendan;
            $tk->id_nd = $id;
            $tk->save();

            $this->dangkydd_auto();
            return redirect()->back() -> with('thanhcong','Tạo tài khoản thành công');

        }


    public function dangnhap(){
        return view('pages.dangnhap');
    }

    public function xulydangnhap(Request $request){
            $email = $request->email;
            $pass = $request->password;

            $result = DB::table('nguoidung')->where('email_nd',$email)->first();

            if($result && Hash::check($pass,$result->matkhau_nd)){
                Session::put('hoten_nd', $result->hoten_nd);
                Session::put('id_nd', $result->id_nd);
                Session::put('email_nd', $result->email_nd);
                Session::put('sdt_nd', $result->sdt_nd);

                return Redirect::to('/trangchu');

                // return redirect()->action([HomeController::class, 'home']);
            }else {
                Session::put('message','Mật khẩu hoặc tài khoản không đúng. Mời nhập lại!');
                return Redirect::to('/dangnhap');
               // return redirect()->back();
            }

            // return view('pages.home');
    }


    public function dangky(){
        return view('pages.dangky');
    }

    public function xulydangky(Request $request){

    $this->validate($request,
        [
            'Name'=>'required',
            'Email'=>'required|email|unique:nguoidung,email_nd',
            'Phone'=>'required|unique:nguoidung,sdt_nd',
            'Password'=>'required',
            'Password_confirm'=>'required|same:Password'
        ],
        [
            'Email.required'=>'Vui lòng nhập email!',
            'Email.email'=>'Không đúng định dạng email!',
            'Email.unique'=>'Email đã có người sử dụng!',
            'Password.required'=>'Vui lòng nhập mật khẩu!',
            'Password_confirm.same'=>'Mật khẩu không khớp!',
            'Phone.required'=>'Vui lòng nhập số điện thoại!',
            'Phone.unique'=>'Số điện thoại đã có người sử dụng!'
        ]);

        $nd = new nguoidung();
        $nd->hoten_nd = $request->Name;
        $nd->email_nd = $request ->Email;
        $nd->sdt_nd = $request ->Phone;
        $nd->matkhau_nd = Hash::make($request->Password);
        $nd->save();
        return redirect()->back() -> with('thanhcong','Tạo tài khoản thành công');

    }


    public function Info()
    {
        $id= session::get('id_nd');
        $ttnd = DB::table('nguoidung')->where('id_nd',$id)->get();
        return view('pages.info')->with('ttnd',$ttnd);
    }

    public function updateInfo(Request $request){
        $id= session::get('id_nd');

        $data= array();
        $data['hoten_nd']= $request->hoten;
        // $data['email_nd']= $request->email;
        $data['sdt_nd']= $request->sdt;
        DB::table('nguoidung')->where('id_nd',$id)->update($data);
        Session::put('hoten_nd',$request->hoten);
        Session::put('message','Cập nhật thông tin người dùng thành công!');
        return Redirect::to('info');
    }

    public function dangxuat(){
        Session::put('hoten_nd',null);
        Session::put('id_nd',null);
        return Redirect::to('/dangnhap');
    }



    public function layout(){
        return view('layout');
    }


}
