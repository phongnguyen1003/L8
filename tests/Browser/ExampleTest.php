<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\taikhoandd;
use App\Models\luudangnhapdd;
use App\Models\baiviet;
use App\Models\hinhanh;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    /*
    //overwrite the APP_URL= in the environment file
    //n?u m�nh mu?n �p d?t 1 website ch�nh d? test:
    protected function baseUrl(){
        return 'https://www.facebook.com/'; //https://www.google.com/
    }
        */


    //============================================CHỢ TỐT==============================================

    /**
     * @group dangkyct
     */
    public function  testDangKyCT()
    {
        $tkdd = taikhoandd::all()->last();
        // dd($tkdd->sodienthoai);
        $this-> browse(function($first) use($tkdd){

            $first  ->visit('https://accounts.chotot.com/')
                    ->pause(2518)
                    ->press('Đăng ký')
                    ->pause(2154)
                    ->type('#content > div > div > div > div > form > input:nth-child(1)',$tkdd->sodienthoai)
                    ->pause(1214)
                    ->type('#content > div > div > div > div > form > input:nth-child(2)',$tkdd->matkhau)
                    ->pause(1245)
                    ->press('ĐĂNG KÝ')
                    ->pause(59981);
                    //nên thay lện pause cuối thành lệnh chờ do chỉ pause đc 60s
                    //để thời gian dài để nhập mã xác thực gửi về điện thoại bằng tay
                    // ->assertSee('Chợ Tốt');
        });
    }

    /**
     * @group dangnhapchotot
     */
    public function  testDangNhapCT()
    {

        //lấy dữ liệu bảng tạm
        $dangnhapdd = luudangnhapdd::all()->first();
        // lấy dữ liệu thằng đang đang nhập
        $tkddn =taikhoandd::where('id_tk',$dangnhapdd->id_tk)->first();

        $this-> browse(function(Browser $first)use($tkddn){
            $first  ->visit('https://accounts.chotot.com/login?continue=https://www.chotot.com/')
                    //->click('#__next > header > div.sc-hSdWYo.iwLlIE > div > div:nth-child(2) > div')
                    ->pause(5000)
                    ->type('#content > div > div > div > div > form > input:nth-child(1)',$tkddn->sodienthoai)
                    ->pause(4123)
                    ->type('#content > div > div > div > div > form > input:nth-child(2)',$tkddn->matkhau)
                    ->pause(3214)
                    ->uncheck('#content > div > div > div > div > form > div:nth-child(3) > label')
                    ->pause(4000)
                    ->press('ĐĂNG NHẬP')
                    ->pause(20001)
                    ->assertSee('Chợ Tốt');
        });
    }

     /**
     * @group dangbaict
     */
    public function  testDangBaiCT()
    {

        $dangnhapdd = luudangnhapdd::all()->first();
        $tkddn = taikhoandd::where('id_tk',$dangnhapdd->id_tk)->first();
        $baidang = baiviet::where('id_bv',$dangnhapdd->id_baidang)->first();
        $id_hinh = $baidang->id_ha;
        $hinhanh = hinhanh::where('id_ha',$id_hinh)->first();

        $this-> browse(function(Browser $first)use($tkddn,$baidang,$hinhanh){
            $first  ->visit('https://accounts.chotot.com/')
                    ->type('#content > div > div > div > div > form > input:nth-child(1)',$tkddn->sodienthoai)
                    ->pause(3500)
                    ->type('#content > div > div > div > div > form > input:nth-child(2)',$tkddn->matkhau)
                    ->pause(5105)
                    ->uncheck('#content > div > div > div > div > form > div:nth-child(3) > label')
                    ->pause(2103)
                    ->press('ĐĂNG NHẬP')
                    ->pause(5007)
                    ->click('#__next > header > div.sc-hSdWYo.iwLlIE > div > div:nth-child(3) > div > a')
                    ->pause(2105)
                    ->clickLink('Dịch vụ, Du lịch')
                    ->pause(2150)
                    ->clickLink('Dịch vụ')
                    ->pause(2143)
                    ->clickLink('Cần bán')
                    ->pause(2414)
                    ->select('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div:nth-child(1) > div:nth-child(2) > div > select','13000')
                    ->pause(2512)
                    ->select('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div:nth-child(2) > div:nth-child(2) > div > select','13104')
                    ->pause(2157)
                    ->select('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div:nth-child(3) > div:nth-child(2) > div > select','9254')
                    ->pause(2578)
                    ->click('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div.footer.navbar-fixed-bottom.formFooter._29qtwZnBfU4ggKBsMxnCL0 > div > div')
                    ->pause(1971)
                    ->radio('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div:nth-child(1) > div.text-center._1A31TKpr3aul3X8swjEql4 > div:nth-child(1)','#company_ad|0')
                    ->pause(2909)
                    ->attach('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div:nth-child(1) > div.col-xs-12._1leuGpQP7fsY3XCp-3eNDZ > input',storage_path('app/public/images/'.$hinhanh->tenhinh))
                    ->pause(5124)
                    ->click('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div.footer.navbar-fixed-bottom.formFooter._29qtwZnBfU4ggKBsMxnCL0 > div > div > a')
                    ->pause(5991)
                    ->type('price',$baidang->giaban)
                    ->pause(4992)
                    ->click('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div.footer.navbar-fixed-bottom.formFooter._29qtwZnBfU4ggKBsMxnCL0 > div > div')
                   ->pause(2105)
                   ->type('#subject',$baidang->tieude)
                   ->pause(2048)
                   ->click('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div.footer.navbar-fixed-bottom.formFooter._29qtwZnBfU4ggKBsMxnCL0 > div > div')
                   ->pause(3541)
                   ->type('body',$baidang->noidung)
                   ->pause(3125)
                   ->click('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div.footer.navbar-fixed-bottom.formFooter._29qtwZnBfU4ggKBsMxnCL0 > div > div > a.btn.btn-lg.btn-default.btn-default-customized')
                   ->pause(2213)
                   ->clickLink('Không giao hàng')
                   ->pause(2513)
                   ->press('ĐĂNG NGAY')
                   ->pause(15420);
                //    ->assertSee('Chợ Tốt');
        });
    }


    //=================================================MUA RẺ=======================================

     /**
     * @group dangkymr
     */
    public function testDangKyMR(){
        $tkdd = taikhoandd::all()->last();
        $this -> browse(function($first) use($tkdd){
            $first  -> visit('https://muare.vn/')
                    -> click('#app > header > div.header.container > div > div.col-lg-3.col-sm-5.col-md-4.col-xs-12 > div.signup > a')
                    -> pause(2999)
                    -> click('#loginpageModal > div > div > div.modal-body.col-xs-12 > div.row-note > div > a')
                    -> pause(2999)
                    -> type('#name2',$tkdd->tendangnhap)
                    -> type('#email',$tkdd->email)
                    -> type('#user_mobile',$tkdd->sodienthoai)
                    -> type('#password2',$tkdd->matkhau)
                    -> type('#password-confirm',$tkdd->matkhau)
                    -> check('#contact-confirm')
                    -> press('#loginpageModal > div > div > div.modal-body.col-xs-12 > div.form-action > form.form-horizontal.register-form > div:nth-child(9) > div > button')
                    -> pause(59847);
                    // thiếu bước nhập mã OTP do chưa kịp nhập :v

        });
    }


     /**
     * @group dangnhapmr
     */
    public function testDangNhapMR(){
         //lấy dữ liệu bảng tạm
         $dangnhapdd = luudangnhapdd::all()->first();
         // lấy dữ liệu thằng đang đang nhập
         $tkddn =taikhoandd::where('id_tk',$dangnhapdd->id_tk)->first();
        $this -> browse(function(Browser $first)use($tkddn){
            $first  -> visit('https://muare.vn/login')
                   // -> click('#app > header > div.header.container > div > div.col-lg-3.col-sm-5.col-md-4.col-xs-12 > div.login > a')
                    -> pause(2978)
                    -> radio('#loginpageModal > div > div > div.modal-body.col-xs-12 > div.form-action > form.form-horizontal.login-form > div:nth-child(3) > label:nth-child(1)','#loginpageModal > div > div > div.modal-body.col-xs-12 > div.form-action > form.form-horizontal.login-form > div:nth-child(3) > label:nth-child(1) > input')
                    -> pause(2154)
                    -> type('#name',$tkddn->tendangnhap)
                    -> pause(2874)
                    -> type('#password',$tkddn->matkhau)
                    -> check('remember')
                    -> press('#loginpageModal > div > div > div.modal-body.col-xs-12 > div.form-action > form.form-horizontal.login-form > div:nth-child(7) > div > button')
                    -> pause(13784);
        });
    }


     /**
     * @group dangbaimr
     */
    public function testDangBaiMR(){
        $this -> browse(function(Browser $first){
            $first  -> visit('https://muare.vn/')
                    -> pause(1999)
                    -> click('#app > header > div.header.container > div > div.col-lg-3.col-sm-5.col-md-4.col-xs-12 > div.login > a')
                    -> pause(2999)
                    -> radio('#loginpageModal > div > div > div.modal-body.col-xs-12 > div.form-action > form.form-horizontal.login-form > div:nth-child(3) > label:nth-child(1)','#loginpageModal > div > div > div.modal-body.col-xs-12 > div.form-action > form.form-horizontal.login-form > div:nth-child(3) > label:nth-child(1) > input')
                    -> type('#name','manhlinh23')
                    -> type('#password','23051998')
                    -> check('remember')
                    -> press('#loginpageModal > div > div > div.modal-body.col-xs-12 > div.form-action > form.form-horizontal.login-form > div:nth-child(7) > div > button')
                    -> pause(2999)
                    -> click('#app > nav > div > div > div.header__links__segment_mega_menu__toggle > a')
                    -> pause(2999)
                    -> press('Đăng tin Sản phẩm')
                    -> pause(3999)
                    -> type('#postTitle','Đăng test thôi nhé abc bkds mdk kbd jdbs dbsd dfsi kcsbk :v')
                    -> type('postDescription','Đây là nội dung phần test đấy nha jkdsk dkfdsk ksbk ksbkfsb s b dbsfk')
                    -> type('#price','1000000')
                    -> select('#js-example-basic-multiple2')
                    -> select('#location-post')
                    -> pause(2999)
                    -> click('#app > section > div > div.row > div > div > div.panel.panel-default > div.panel-body > form > div:nth-child(4) > div > div.row-attr.row.storage-box > div > div > a.add-new')
                    -> pause(3900)
                    -> type('title','test test test test test test')
                    -> type('#popup_price','1000000')
                    -> type('#des','Test thôi nên không có gì để mô tả cả đâu :v test test test test test test test test')
                    -> select('#js-example-basic-multiple')
                    ->attach('#upload',storage_path('app/public/images/g5.jpg'))

                    // -> click('#form-storage > div.attr-basic.row > div.box-image.row > div > a')
                    -> pause(5000)
                    -> radio('#form-storage > div.attr-advance.row > div > div:nth-child(3) > div:nth-child(1)','#statusSale1')
                    -> radio('#form-storage > div.attr-advance.row > div > div:nth-child(5) > div:nth-child(1)','#statusNew')
                    -> check('#location8')
                    -> pause(30000)
                    -> press('#saveItem')
                    -> pause(3999)
                    -> type('#nameInfo','Phạm Băng Băng')
                    -> pause(5900);
        });
    }


    //===================================================FACEBOOK=================================

     /**
     * @group dangnhapfb
     */
    public function  testDangNhapfb()
    {   //lấy dữ liệu bảng tạm
        $dangnhapdd = luudangnhapdd::all()->first();
        // lấy dữ liệu thằng đang đang nhập
        $tkddn =taikhoandd::where('id_tk',$dangnhapdd->id_tk)->first();

        $this-> browse(function(Browser $first)use($tkddn){
            $first  ->visit('https://www.facebook.com/')
                    ->pause(2415)
                    ->type('email',$tkddn->email)
                    ->pause(2321)
                    ->type('pass',$tkddn->matkhau)
                    ->pause(2999)
                    ->press('login')
                    ->pause(15142);

        });
    }

     /**
     * @group dangkyfb
     */

    public function  testDangKyfb()
    {
        $tkdd = taikhoandd::all()->last();
        $this-> browse(function(Browser $first)use($tkdd){
            $first  ->visit('https://www.facebook.com/')
                    ->pause(2000)
                    ->click('#u_0_2')
                    ->pause(3000)
                    ->type('lastname','Trâu')
                    ->pause(1512)
                    ->type('firstname','Trâu')
                    ->pause(2541)
                    ->type('reg_email__',$tkdd->email)
                    ->pause(2145)
                    ->type('#u_1_j',$tkdd->email)
                    ->pause(1547)
                    ->type('#password_step_input',$tkdd->matkhau)
                    ->pause(2153)
                    ->select('#day',$tkdd->ngaysinh)
                    ->pause(1784)
                    ->select('#month',$tkdd->thangsinh)
                    ->pause(1873)
                    ->select('#year',$tkdd->namsinh)
                    ->pause(1478)
                    ->radio('#u_1_o > span:nth-child(1)','#u_1_4')
                    ->pause(2101)
                    ->press('#u_1_s')
                    ->pause(49871);

        });
    }

     /**
     * @group dangbaifb
     */
    public function  testDangBaiHoiNhomfb()
    {
        $dangnhapdd = luudangnhapdd::all()->first();
        $tkddn = taikhoandd::where('id_tk',$dangnhapdd->id_tk)->first();
        $baidang = baiviet::where('id_bv',$dangnhapdd->id_baidang)->first();
        $id_hinh = $baidang->id_ha;
        $hinhanh = hinhanh::where('id_ha',$id_hinh)->first();
        $this->browse(function(Browser $first)use($tkddn,$baidang,$hinhanh) {
            $first->visit('https://www.facebook.com/')
                ->type('email', $tkddn->email)
                ->pause(2145)
                ->type('pass', $tkddn->matkhau)
                ->pause(2999)
                ->press('login')
                ->pause(1999)
                ->click('#mount_0_0 > div > div:nth-child(1) > div.rq0escxv.l9j0dhe7.du4w35lb > div.rq0escxv.l9j0dhe7.du4w35lb > div > div > div.j83agx80.cbu4d94t.d6urw2fd.dp1hu0rb.l9j0dhe7.du4w35lb > div.rq0escxv.l9j0dhe7.du4w35lb.j83agx80.pfnyh3mw.taijpn5t.gs1a9yip.owycx6da.btwxx1t3.dp1hu0rb.p01isnhg > div > div.rq0escxv.lpgh02oy.du4w35lb.pad24vr5.rirtxc74.dp1hu0rb.fer614ym.bx45vsiw.o387gat7.qbu88020.ni8dbmo4.stjgntxs.czl6b2yu > div > div > div.j83agx80.cbu4d94t.buofh1pr > div > div > div.buofh1pr > div:nth-child(3) > ul > li > div > a')
                ->pause(2516)
                ->press('#mount_0_0 > div > div:nth-child(1) > div.rq0escxv.l9j0dhe7.du4w35lb > div.rq0escxv.l9j0dhe7.du4w35lb > div > div > div.j83agx80.cbu4d94t.d6urw2fd.dp1hu0rb.l9j0dhe7.du4w35lb > div.l9j0dhe7.dp1hu0rb.cbu4d94t.j83agx80 > div.j83agx80.cbu4d94t > div > div > div > div > div.rq0escxv.l9j0dhe7.du4w35lb.qmfd67dx.hpfvmrgz.gile2uim.buofh1pr.g5gj957u.aov4n071.oi9244e8.bi6gxh9e.h676nmdw.aghb5jc5 > div:nth-child(1) > div > div > div > div.bp9cbjyn.j83agx80.ihqw7lf3.hv4rvrfc.dati1w0a.pybr56ya > div')
                ->pause(2552)
                ->type('#mount_0_0 > div > div:nth-child(1) > div.rq0escxv.l9j0dhe7.du4w35lb > div:nth-child(7) > div > div > div.rq0escxv.l9j0dhe7.du4w35lb > div > div.iqfcb0g7.tojvnm2t.a6sixzi8.k5wvi7nf.q3lfd5jv.pk4s997a.bipmatt0.cebpdrjk.qowsmv63.owwhemhu.dp1hu0rb.dhp61c6y.l9j0dhe7.iyyx5f41.a8s20v7p > div > div > div > div > div.kr520xx4.pedkr2u6.ms05siws.pnx7fd3z.b7h9ocf4.pmk7jnqg.j9ispegn > form > div > div.kr520xx4.pedkr2u6.ms05siws.pnx7fd3z.b7h9ocf4.pmk7jnqg.j9ispegn > div > div > div.j83agx80.cbu4d94t.f0kvp8a6.mfofr4af.l9j0dhe7.oh7imozk > div.q5bimw55.rpm2j7zs.k7i0oixp.gvuykj2m.j83agx80.cbu4d94t.ni8dbmo4.eg9m0zos.l9j0dhe7.du4w35lb.ofs802cu.pohlnb88.dkue75c7.mb9wzai9.l56l04vs.r57mb794.kh7kg01d.c3g1iek1.buofh1pr > div.j83agx80.cbu4d94t.buofh1pr > div.o6r2urh6.buofh1pr.datstx6m.l9j0dhe7.oh7imozk > div.rq0escxv.buofh1pr.df2bnetk.hv4rvrfc.dati1w0a.l9j0dhe7.k4urcfbm.du4w35lb.gbhij3x4 > div > div > div > div > div._5rpb > div', $baidang->noidung)
                ->pause(20012)
                ->attach('#mount_0_0 > div > div:nth-child(1) > div.rq0escxv.l9j0dhe7.du4w35lb > div:nth-child(7) > div > div > div.rq0escxv.l9j0dhe7.du4w35lb > div > div.iqfcb0g7.tojvnm2t.a6sixzi8.k5wvi7nf.q3lfd5jv.pk4s997a.bipmatt0.cebpdrjk.qowsmv63.owwhemhu.dp1hu0rb.dhp61c6y.l9j0dhe7.iyyx5f41.a8s20v7p > div > div > div > div > div.kr520xx4.pedkr2u6.ms05siws.pnx7fd3z.b7h9ocf4.pmk7jnqg.j9ispegn > form > div > div.kr520xx4.pedkr2u6.ms05siws.pnx7fd3z.b7h9ocf4.pmk7jnqg.j9ispegn > div > div > div.j83agx80.cbu4d94t.f0kvp8a6.mfofr4af.l9j0dhe7.oh7imozk > div.ihqw7lf3.discj3wi.l9j0dhe7 > div.scb9dxdr.sj5x9vvc.dflh9lhu.cxgpxx05.dhix69tm.wkznzc2l.i1fnvgqd.j83agx80.rq0escxv.ibutc8p7.l82x9zwi.uo3d90p7.pw54ja7n.ue3kfks5.tr4kgdav.eip75gnj.ccnbzhu1.dwg5866k.cwj9ozl2.bp9cbjyn > div.j83agx80 > div:nth-child(1) > span > div > div > div > div',storage_path('app/public/images/'.$hinhanh->tenhinh))
                ->pause(20015)
                ->click('#mount_0_0 > div > div:nth-child(1) > div.rq0escxv.l9j0dhe7.du4w35lb > div:nth-child(7) > div > div > div.rq0escxv.l9j0dhe7.du4w35lb > div > div.iqfcb0g7.tojvnm2t.a6sixzi8.k5wvi7nf.q3lfd5jv.pk4s997a.bipmatt0.cebpdrjk.qowsmv63.owwhemhu.dp1hu0rb.dhp61c6y.l9j0dhe7.iyyx5f41.a8s20v7p > div > div > div > div > div.kr520xx4.pedkr2u6.ms05siws.pnx7fd3z.b7h9ocf4.pmk7jnqg.j9ispegn > form > div > div.kr520xx4.pedkr2u6.ms05siws.pnx7fd3z.b7h9ocf4.pmk7jnqg.j9ispegn > div > div > div.j83agx80.cbu4d94t.f0kvp8a6.mfofr4af.l9j0dhe7.oh7imozk > div.ihqw7lf3.discj3wi.l9j0dhe7 > div.rq0escxv.l9j0dhe7.du4w35lb.j83agx80.pfnyh3mw.i1fnvgqd.gs1a9yip.owycx6da.btwxx1t3.hv4rvrfc.dati1w0a.discj3wi.b5q2rw42.lq239pai.mysgfdmx.hddg9phg > div > div')
                ->pause(15475);
        });
    }


    //=========================================https://24hquangcao.com/================================================

     /**
     * @group dangky24hqc
     */
   // vướng chỗ capcha
    public function  testDangKy24hqc()
    {
        $tkdd = taikhoandd::all()->last();
        $this-> browse(function(Browser $first)use($tkdd){
            $first  ->visit('https://24hquangcao.com/register.html')
                   // ->pause(3000)
                   // ->click('#container > header > div.menu-top > div > div > div:nth-child(2) > ul > li:nth-child(3) > a')
                    ->pause(2874)
                    ->type('#name',$tkdd->hoten)
                    ->pause(1784)
                    ->type('#phone',$tkdd->sodienthoai)
                    ->pause(1874)
                    ->type('#email',$tkdd->email)
                    ->pause(1598)
                    ->type('#reg_form > div:nth-child(8) > div > div > input',$tkdd->tedangnhap)
                    ->pause(1548)
                    ->type('#reg_form > div:nth-child(9) > div > div > input',$tkdd->matkhau)
                    ->pause(1910)
                    ->type('#confirm',$tkdd->matkhau)
                    ->pause(299154);
                    //câu hỏi xác thực và check capcha
                   // ->press('#reg_form > div:nth-child(13) > div > div.pull-right.plr5.text-right > button')
                   // ->pause(2999);
        });
    }

     /**
     * @group dangnhap24hqc
     */
     public function  testDangNhap24hqc()
    {
        //lấy dữ liệu bảng tạm
        $dangnhapdd = luudangnhapdd::all()->first();
        // lấy dữ liệu thằng đang đang nhập
        $tkddn =taikhoandd::where('id_tk',$dangnhapdd->id_tk)->first();
        $this-> browse(function(Browser $first) use($dangnhapdd,$tkddn){
            $first  ->visit('https://24hquangcao.com/register.html')
                    //->click('#container > header > div.menu-top > div > div > div:nth-child(2) > ul > li:nth-child(4) > a')
                    ->pause(3512)
                    ->type('#username',$tkddn->email)
                    ->pause(1521)
                    ->type('#password',$tkddn->matkhau)
                    ->pause(1485)
                    ->press('#container > section.sec-login > div > div > div:nth-child(1) > div.main-login.main-center > form > div:nth-child(3) > div > div.col-sm-4.plr5.text-right > button')
                    ->pause(15231);

        });
    }

     /**
     * @group dangbai24hqc
     */
    //gặp vấn đề capcha
    public function  testDangBai24hqc()
    {
        $dangnhapdd = luudangnhapdd::all()->first();
        $tkddn = taikhoandd::where('id_tk',$dangnhapdd->id_tk)->first();
        $baidang = baiviet::where('id_bv',$dangnhapdd->id_baidang)->first();
        $id_hinh = $baidang->id_ha;
        $hinhanh = hinhanh::where('id_ha',$id_hinh)->first();
        $this-> browse(function(Browser $first) use($tkddn,$baidang,$hinhanh){
            $first  ->visit('https://24hquangcao.com/register.html')
                    //->click('#container > header > div.menu-top > div > div > div:nth-child(2) > ul > li:nth-child(4) > a')
                    ->pause(3451)
                    ->type('#username',$tkddn->email)
                    ->pause(1542)
                    ->type('#password',$tkddn->matkhau)
                    ->pause(3478)
                    ->press('#container > section.sec-login > div > div > div:nth-child(1) > div.main-login.main-center > form > div:nth-child(3) > div > div.col-sm-4.plr5.text-right > button')
                    ->pause(3541)
                    ->click('#container > header > div.top-header > div > div.row5 > div.col-md-9.col-80.plr0 > div.col-md-2.col-sm-3.plr5 > div > div.dang-tin > a')
                    ->pause(5014)
                    ->select('#danhmuc','582')
                    ->pause(1234)
                    ->type('#frmDangTin > div:nth-child(2) > div > div > div:nth-child(3) > div > div.col-sm-9.plr5 > div > input',$baidang->tieude)
                    ->pause(1324)
                    ->radio('#frmDangTin > div:nth-child(2) > div > div > div.list-dv > div.clearfix.frm-item.mb10 > div > div.col-sm-9.tin-right.plr5 > label:nth-child(2)','loaisp')
                    ->pause(1028)
                    ->radio('#frmDangTin > div:nth-child(2) > div > div > div.list-dv > div.clearfix.frm-item.form-group > div > div.col-sm-9.tin-right.plr5 > label:nth-child(1)','loaitin')
                    ->pause(1023)
                    ->select('#frmDangTin > div:nth-child(2) > div > div > div:nth-child(5) > div > div:nth-child(2) > select','79')
                    ->pause(1129)
                    ->select('#frmDangTin > div:nth-child(2) > div > div > div:nth-child(5) > div > div:nth-child(4) > select','763')
                    ->pause(1145)
                    ->type('#frmDangTin > div:nth-child(2) > div > div > div:nth-child(6) > div > div.col-sm-9.plr5 > div > input','D1/6 đường 385, Tăng Nhơn Phú A')
                    ->pause(1021)
                    ->type('#Gia_cu',$baidang->giaban)
                    ->pause(1210)
                    ->type('#frmDangTin > div:nth-child(2) > div > div > div:nth-child(11) > div > div:nth-child(2) > input',$tkddn->hoten)
                    ->pause(971)
                    ->type('#frmDangTin > div:nth-child(2) > div > div > div:nth-child(11) > div > div:nth-child(4) > input',$tkddn->matkhau)
                    ->pause(2178)
                    ->attach('#file',storage_path('app/public/images/'.$hinhanh->tenhinh))
                    ->pause(2378)
                    ->type('#new_editor_fix',$baidang->noidung)
                    ->pause(2147)
                    ->check('#myCheck')
                    ->pause(855476);
                    //check capcha bằng tay
                    // ->press('#submitBtn')
                    // ->pause(4999);

        });
    }

    //======================================================NHẬT TẢO=================================

    /**
     * @group dangnhapnhattao
     */

    public function  testDangNhapNhatTao()
    {
        //lấy dữ liệu bảng tạm
        $dangnhapdd = luudangnhapdd::all()->first();
        // lấy dữ liệu thằng đang đang nhập
        $tkddn =taikhoandd::where('id_tk',$dangnhapdd->id_tk)->first();
        $this-> browse(function(Browser $first)use($tkddn){
            $first  ->visit('https://nhattao.com/')
                    ->pause(2002)
                    ->click('#header > div.pageWidth > div > div > div.headerBar-right > a.headerBar-login.OverlayTrigger')
                    ->pause(2501)
                    ->type('#ctrl_pageLogin_login',$tkddn->sodienthoai)
                    ->pause(2711)
                    ->type('#ctrl_pageLogin_password',$tkddn->matkhau)
                    ->pause(3512)
                    ->press('.submitUnit > .button')
                    ->pause(15471);
        });
    }

     /**
     * @group dangkynhattao
     */

    public function  testDangKyNhatTao()
    {
        $tkdd = taikhoandd::all()->last();
        $this-> browse(function(Browser $first)use($tkdd){
            $first  ->visit('https://nhattao.com/')
                    ->pause(2002)
                    ->click('#header > div.pageWidth > div > div > div.headerBar-right > a.OverlayTrigger.headerBar-register')
                    ->pause(2501)
                    ->type('form > div:nth-child(6) > .floatInput',$tkdd->sodienthoai)
                    ->pause(2711)
                    ->type('form > div:nth-child(7) > .fieldPassword',$tkdd->matkhau)
                    ->pause(2731)
                    ->type('form > div:nth-child(8) > .floatInput',$tkdd->matkhau)
                    ->pause(2415)
                    ->type('form > div.dobField > div:nth-child(1) > input[name="dob_day"]',$tkdd->ngaysinh)
                    ->pause(2147)
                    ->select('form > div.dobField > div.dobMonth > select[name="dob_month"]',$tkdd->thangsinh)
                    ->pause(2715)
                    ->select('form > div.dobField > div.dobYear > select[name="dob_year"]',$tkdd->namsinh)
                    ->pause(3512)
                    ->select('form > .fieldGender','female')
                    ->pause(2451)
                    ->press('.submitUnit > .button')
                    ->pause(500005);
                    //đợi và nhập mã xác thực
        });
    }

     /**
     * @group dangbainhattao
     */
    public function  testDangBaiNhatTao()
        {

            $dangnhapdd = luudangnhapdd::all()->first();
            $tkddn = taikhoandd::where('id_tk',$dangnhapdd->id_tk)->first();
            $baidang = baiviet::where('id_bv',$dangnhapdd->id_baidang)->first();
            $id_hinh = $baidang->id_ha;
            $hinhanh = hinhanh::where('id_ha',$id_hinh)->first();
            $this-> browse(function(Browser $first)use($tkddn,$baidang,$hinhanh){
                $first  ->visit('https://nhattao.com/')
                        ->pause(2002)
                        ->click('#header > div.pageWidth > div > div > div.headerBar-right > a.headerBar-login.OverlayTrigger')
                        ->pause(2501)
                        ->type('#ctrl_pageLogin_login',$tkddn->sodienthoai)
                        ->pause(2711)
                        ->type('#ctrl_pageLogin_password',$tkddn->matkhau)
                        ->pause(3512)
                        ->press('.submitUnit > .button')
                        ->pause(2345)
                        ->click('#header > div.pageWidth > div > div > div.headerBar-right > a')
                        ->pause(2151)
                        ->type('#ctrl_title_thread_create',$baidang->tieude)
                        ->pause(2012)
                        ->attach('#ctrl_xfServerUniqueId2',storage_path('app/public/images/'.$hinhanh->tenhinh))
                        ->pause(2312)
                        ->type('#ctrl_GlobalCreator_classified_price',$baidang->giaban)
                        ->pause(2154)
                        ->check('#ctrl_classified_message_html_enabled')
                        ->pause(2113)
                        ->type('#ctrl_description_hider > textarea',$baidang->noidung)
                        ->pause(5523)
                        ->press('.NhattaoMods_FormStep1 > .button')
                        ->pause(3212)
                        //do website không có danh mục dịch vụ du lịch nên cho chọn 1 danh mục khác
                        ->select('.GlobalCreator_ThreadFormStep > .GlobalCreator_ThreadFormNodeAuto > li > .NhattaoMods_TextField','675')
                        ->pause(7141)
                        ->select('node_id')
                        ->pause(6541)
                        ->radio('#ctrl_classified_status1','1')
                        ->pause(10459)
                        ->press('Đăng bán')
                        ->pause(35015);
            });
        }

}
