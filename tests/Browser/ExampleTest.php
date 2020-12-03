<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\taikhoandd;
use App\Models\dangnhapdd;
use App\Models\baiviet;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


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
        // dd($tkdd);
        $this-> browse(function($first) use($tkdd){

            $first  ->visit('https://accounts.chotot.com/')
                    ->press('Đăng ký')
                    ->type('#content > div > div > div > div > form > input:nth-child(1)',$tkdd->sodienthoai)
                    ->type('#content > div > div > div > div > form > input:nth-child(2)',$tkdd->matkhau)
                    ->press('ĐĂNG KÝ')
                    ->pause(5000)
                    ->assertSee('Chợ Tốt');
        });
    }

    /**
     * @group dangnhapct
     */
    public function  testDangNhapCT()
    {
        //lấy dữ liệu bảng tạm
        $dangnhapdd = dangnhapdd::all()->first();
        // lấy dữ liệu thằng đang đang nhập
        $tkddn =taikhoandd::where('id_tk',$dangnhapdd->id_tk)->first();
        // dd($tkddddd);
        $this-> browse(function(Browser $first)use($tkddn){
            $first  ->visit('https://accounts.chotot.com/login?continue=https://www.chotot.com/')
                    //->click('#__next > header > div.sc-hSdWYo.iwLlIE > div > div:nth-child(2) > div')
                    ->pause(5000)
                    ->type('#content > div > div > div > div > form > input:nth-child(1)',$tkddn->sodienthoai)
                    ->type('#content > div > div > div > div > form > input:nth-child(2)',$tkddn->matkhau)
                    ->uncheck('#content > div > div > div > div > form > div:nth-child(3) > label')
                    ->pause(4000)
                    ->press('ĐĂNG NHẬP')
                    ->pause(5000)
                    ->assertSee('Chợ Tốt');
        });
    }

     /**
     * @group dangbaict
     */
    public function  testDangBaiCT()
    {       
        $dangnhapdd = dangnhapdd::all()->first();
        $tkddn = taikhoandd::where('id_tk',$dangnhapdd->id_tk)->first();
        $baidang = baiviet::where('id_bv',$dangnhapdd->id_baidang)->first();
        // dd($baidang);
//  $tkdd = taikhoandd::all()->last();
        $this-> browse(function(Browser $first)use($tkddn,$baidang){
            $first->visit('https://accounts.chotot.com/')
                    ->type('#content > div > div > div > div > form > input:nth-child(1)',$tkddn->sodienthoai)
                    ->type('#content > div > div > div > div > form > input:nth-child(2)',$tkddn->matkhau)
                    ->uncheck('#content > div > div > div > div > form > div:nth-child(3) > label')
                    ->press('ĐĂNG NHẬP')
                    ->pause(150000)
                    ->click('#__next > header > div.sc-hSdWYo.iwLlIE > div > div:nth-child(3) > div > a')
                    ->pause(1999)
                    ->clickLink('Dịch vụ, Du lịch')
                    ->pause(1999)
                    ->clickLink('Dịch vụ')
                    ->pause(1999)
                    ->clickLink('Cần bán')
                    ->pause(1999)
                    ->select('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div:nth-child(1) > div:nth-child(2) > div > select')
                    ->select('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div:nth-child(2) > div:nth-child(2) > div > select')
                    ->select('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div:nth-child(3) > div:nth-child(2) > div > select')
                    ->pause(2999)
                    ->click('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div.footer.navbar-fixed-bottom.formFooter._29qtwZnBfU4ggKBsMxnCL0 > div > div')
                    ->pause(1999)
                    ->radio('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div:nth-child(1) > div.text-center._1A31TKpr3aul3X8swjEql4 > div:nth-child(1)','#company_ad|0')
                    ->pause(2909)
                  //  ->press('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div:nth-child(1) > div.col-xs-12._1leuGpQP7fsY3XCp-3eNDZ > div > div._3wLdyQ1JXeAenU3yteGpQI > button')
                  //  ->pause(29999)
                    ->attach('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div:nth-child(1) > div.col-xs-12._1leuGpQP7fsY3XCp-3eNDZ > input',storage_path('app/public/images/g5.jpg'))
                    ->pause(10000)
                    ->click('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div.footer.navbar-fixed-bottom.formFooter._29qtwZnBfU4ggKBsMxnCL0 > div > div > a')
                    ->pause(1999)
                    ->type('price','230')
                    ->pause(1999)
                    ->click('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div.footer.navbar-fixed-bottom.formFooter._29qtwZnBfU4ggKBsMxnCL0 > div > div')
                   ->pause(1999)
                   ->type('#subject','Dịch vụ test thôi')
                   ->pause(1999)
                   ->click('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div.footer.navbar-fixed-bottom.formFooter._29qtwZnBfU4ggKBsMxnCL0 > div > div')
                   ->pause(999)
                   ->type('body','Lê Thị Thùy Linh,tôi đang test thử dịch vụ đăng bài trên trang chợ tốt thôi nhé!!! eheheheheheheheheehhe')
                   ->pause(1999)
                   ->click('#content > div > div > div > div.container.wXl5RTamVUQpIsQLT-GCD > form > div.footer.navbar-fixed-bottom.formFooter._29qtwZnBfU4ggKBsMxnCL0 > div > div > a.btn.btn-lg.btn-default.btn-default-customized')
                   ->pause(1999)
                   ->clickLink('Không giao hàng')
                   ->pause(1999)
                   ->press('ĐĂNG NGAY')
                   ->pause(2999)
                   ->assertSee('Chợ Tốt');
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
                    -> pause(30000);
                    // thiếu bước nhập mã OTP do chưa kịp nhập :v

        });
    }


     /**
     * @group dangnhapmr
     */
    public function testDangNhapMR(){
        $this -> browse(function(Browser $first){
            $first  -> visit('https://muare.vn/')
                    -> click('#app > header > div.header.container > div > div.col-lg-3.col-sm-5.col-md-4.col-xs-12 > div.login > a')
                    -> pause(2999)
                    -> radio('#loginpageModal > div > div > div.modal-body.col-xs-12 > div.form-action > form.form-horizontal.login-form > div:nth-child(3) > label:nth-child(1)','#loginpageModal > div > div > div.modal-body.col-xs-12 > div.form-action > form.form-horizontal.login-form > div:nth-child(3) > label:nth-child(1) > input')
                    -> type('#name','manhlinh23')
                    -> type('#password','23051998')
                    -> check('remember')
                    -> press('#loginpageModal > div > div > div.modal-body.col-xs-12 > div.form-action > form.form-horizontal.login-form > div:nth-child(7) > div > button')
                    -> pause(10000);
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
    {
        $this-> browse(function(Browser $first){
            $first  ->visit('https://www.facebook.com/')
                    ->type('email','linhbathai@gmail.com')
                    ->type('pass','23051998')
                    ->pause(2999)
                    ->press('login')
                    ->pause(4999)
                    ->assertSee('facebook');
        });
    }

     /**
     * @group dangkyfb
     */

    public function  testDangKyfb()
    {
        $this-> browse(function(Browser $first){
            $first  ->visit('https://www.facebook.com/')
                    ->pause(2000)
                    ->click('#u_0_2')
                    ->pause(3000)
                    ->type('lastname','Trâu')
                    ->type('firstname','Trâu')
                    ->type('reg_email__','thuylinh23598@gmail.com')
                    ->type('#u_1_j','thuylinh23598@gmail.com')
                    ->type('#password_step_input','23051998')
                    ->select('#day','23')
                    ->select('#month','Tháng 5')
                    ->select('#year','1998')
                    ->radio('#u_1_o > span:nth-child(1)','#u_1_4')
                    ->press('#u_1_s')
                    ->pause(49999)
                    ->assertSee('facebook');
        });
    }

     /**
     * @group dangbaifb
     */
    public function  testDangBaiHoiNhomfb()
    {
        $this->browse(function (Browser $first) {
            $first->visit('https://www.facebook.com/')
                ->type('email', 'linhbathai@gmail.com')
                ->type('pass', '23051998')
                ->pause(2999)
                ->press('login')
                ->pause(1999)
                ->click('#mount_0_0 > div > div:nth-child(1) > div.rq0escxv.l9j0dhe7.du4w35lb > div.rq0escxv.l9j0dhe7.du4w35lb > div > div > div.j83agx80.cbu4d94t.d6urw2fd.dp1hu0rb.l9j0dhe7.du4w35lb > div.rq0escxv.l9j0dhe7.du4w35lb.j83agx80.pfnyh3mw.taijpn5t.gs1a9yip.owycx6da.btwxx1t3.dp1hu0rb.p01isnhg > div > div.rq0escxv.lpgh02oy.du4w35lb.pad24vr5.rirtxc74.dp1hu0rb.fer614ym.bx45vsiw.o387gat7.qbu88020.ni8dbmo4.stjgntxs.czl6b2yu > div > div > div.j83agx80.cbu4d94t.buofh1pr > div > div > div.buofh1pr > div:nth-child(3) > ul > li > div > a')
                ->pause(5999)
                ->press('#mount_0_0 > div > div:nth-child(1) > div.rq0escxv.l9j0dhe7.du4w35lb > div.rq0escxv.l9j0dhe7.du4w35lb > div > div > div.j83agx80.cbu4d94t.d6urw2fd.dp1hu0rb.l9j0dhe7.du4w35lb > div.l9j0dhe7.dp1hu0rb.cbu4d94t.j83agx80 > div.j83agx80.cbu4d94t > div > div > div > div > div.rq0escxv.l9j0dhe7.du4w35lb.qmfd67dx.hpfvmrgz.gile2uim.buofh1pr.g5gj957u.aov4n071.oi9244e8.bi6gxh9e.h676nmdw.aghb5jc5 > div:nth-child(1) > div > div > div > div.bp9cbjyn.j83agx80.ihqw7lf3.hv4rvrfc.dati1w0a.pybr56ya > div')
                ->pause(5900)
                ->type('#mount_0_0 > div > div:nth-child(1) > div.rq0escxv.l9j0dhe7.du4w35lb > div:nth-child(7) > div > div > div.rq0escxv.l9j0dhe7.du4w35lb > div > div.iqfcb0g7.tojvnm2t.a6sixzi8.k5wvi7nf.q3lfd5jv.pk4s997a.bipmatt0.cebpdrjk.qowsmv63.owwhemhu.dp1hu0rb.dhp61c6y.l9j0dhe7.iyyx5f41.a8s20v7p > div > div > div > div > div.kr520xx4.pedkr2u6.ms05siws.pnx7fd3z.b7h9ocf4.pmk7jnqg.j9ispegn > form > div > div.kr520xx4.pedkr2u6.ms05siws.pnx7fd3z.b7h9ocf4.pmk7jnqg.j9ispegn > div > div > div.j83agx80.cbu4d94t.f0kvp8a6.mfofr4af.l9j0dhe7.oh7imozk > div.q5bimw55.rpm2j7zs.k7i0oixp.gvuykj2m.j83agx80.cbu4d94t.ni8dbmo4.eg9m0zos.l9j0dhe7.du4w35lb.ofs802cu.pohlnb88.dkue75c7.mb9wzai9.l56l04vs.r57mb794.kh7kg01d.c3g1iek1.buofh1pr > div.j83agx80.cbu4d94t.buofh1pr > div.o6r2urh6.buofh1pr.datstx6m.l9j0dhe7.oh7imozk > div.rq0escxv.buofh1pr.df2bnetk.hv4rvrfc.dati1w0a.l9j0dhe7.k4urcfbm.du4w35lb.gbhij3x4 > div > div > div > div > div._5rpb > div', 'love VN')
                ->pause(3999)
                ->attach('#mount_0_0 > div > div:nth-child(1) > div.rq0escxv.l9j0dhe7.du4w35lb > div:nth-child(7) > div > div > div.rq0escxv.l9j0dhe7.du4w35lb > div > div.iqfcb0g7.tojvnm2t.a6sixzi8.k5wvi7nf.q3lfd5jv.pk4s997a.bipmatt0.cebpdrjk.qowsmv63.owwhemhu.dp1hu0rb.dhp61c6y.l9j0dhe7.iyyx5f41.a8s20v7p > div > div > div > div > div.kr520xx4.pedkr2u6.ms05siws.pnx7fd3z.b7h9ocf4.pmk7jnqg.j9ispegn > form > div > div.kr520xx4.pedkr2u6.ms05siws.pnx7fd3z.b7h9ocf4.pmk7jnqg.j9ispegn > div > div > div.j83agx80.cbu4d94t.f0kvp8a6.mfofr4af.l9j0dhe7.oh7imozk > div.ihqw7lf3.discj3wi.l9j0dhe7 > div.scb9dxdr.sj5x9vvc.dflh9lhu.cxgpxx05.dhix69tm.wkznzc2l.i1fnvgqd.j83agx80.rq0escxv.ibutc8p7.l82x9zwi.uo3d90p7.pw54ja7n.ue3kfks5.tr4kgdav.eip75gnj.ccnbzhu1.dwg5866k.cwj9ozl2.bp9cbjyn > div.j83agx80 > div:nth-child(1) > span > div > div > div > div',storage_path('app/public/images/g5.jpg'))
                // ->click('#mount_0_0 > div > div:nth-child(1) > div.rq0escxv.l9j0dhe7.du4w35lb > div:nth-child(7) > div > div > div.rq0escxv.l9j0dhe7.du4w35lb > div > div.iqfcb0g7.tojvnm2t.a6sixzi8.k5wvi7nf.q3lfd5jv.pk4s997a.bipmatt0.cebpdrjk.qowsmv63.owwhemhu.dp1hu0rb.dhp61c6y.l9j0dhe7.iyyx5f41.a8s20v7p > div > div > div > div > div.kr520xx4.pedkr2u6.ms05siws.pnx7fd3z.b7h9ocf4.pmk7jnqg.j9ispegn > form > div > div.kr520xx4.pedkr2u6.ms05siws.pnx7fd3z.b7h9ocf4.pmk7jnqg.j9ispegn > div > div > div.j83agx80.cbu4d94t.f0kvp8a6.mfofr4af.l9j0dhe7.oh7imozk > div.ihqw7lf3.discj3wi.l9j0dhe7 > div.scb9dxdr.sj5x9vvc.dflh9lhu.cxgpxx05.dhix69tm.wkznzc2l.i1fnvgqd.j83agx80.rq0escxv.ibutc8p7.l82x9zwi.uo3d90p7.pw54ja7n.ue3kfks5.tr4kgdav.eip75gnj.ccnbzhu1.dwg5866k.cwj9ozl2.bp9cbjyn > div.j83agx80 > div:nth-child(1) > span > div')
                ->pause(10000)
                ->click('#mount_0_0 > div > div:nth-child(1) > div.rq0escxv.l9j0dhe7.du4w35lb > div:nth-child(7) > div > div > div.rq0escxv.l9j0dhe7.du4w35lb > div > div.iqfcb0g7.tojvnm2t.a6sixzi8.k5wvi7nf.q3lfd5jv.pk4s997a.bipmatt0.cebpdrjk.qowsmv63.owwhemhu.dp1hu0rb.dhp61c6y.l9j0dhe7.iyyx5f41.a8s20v7p > div > div > div > div > div.kr520xx4.pedkr2u6.ms05siws.pnx7fd3z.b7h9ocf4.pmk7jnqg.j9ispegn > form > div > div.kr520xx4.pedkr2u6.ms05siws.pnx7fd3z.b7h9ocf4.pmk7jnqg.j9ispegn > div > div > div.j83agx80.cbu4d94t.f0kvp8a6.mfofr4af.l9j0dhe7.oh7imozk > div.ihqw7lf3.discj3wi.l9j0dhe7 > div.rq0escxv.l9j0dhe7.du4w35lb.j83agx80.pfnyh3mw.i1fnvgqd.gs1a9yip.owycx6da.btwxx1t3.hv4rvrfc.dati1w0a.discj3wi.b5q2rw42.lq239pai.mysgfdmx.hddg9phg > div > div')
                ->pause(5000)
                ->assertSee('facebook');
        });
    }



    //=========================================https://24hquangcao.com/================================================

     /**
     * @group dangky24hqc
     */
   // vướng chỗ capcha
    public function  testDangKy24hqc()
    {
        $this-> browse(function(Browser $first){
            $first  ->visit('https://24hquangcao.com/')
                    ->pause(3000)
                    ->click('#container > header > div.menu-top > div > div > div:nth-child(2) > ul > li:nth-child(3) > a')
                    ->pause(2999)
                    ->type('#name','Lê Văn An')
                    ->pause(1000)
                    ->type('#phone','0395608800')
                    ->pause(1000)
                    ->type('#email','linhbathai@gmail.com')
                    ->pause(1500)
                    ->type('#reg_form > div:nth-child(8) > div > div > input','manhlinh')
                    ->pause(1000)
                    ->type('#reg_form > div:nth-child(9) > div > div > input','23051998')
                    ->pause(1000)
                    ->type('#confirm','23051998')
                    ->pause(60000)
                    //câu hỏi xác thực và check capcha
                    ->press('#reg_form > div:nth-child(13) > div > div.pull-right.plr5.text-right > button')
                    ->pause(2999);
        });
    }

     /**
     * @group dangnhap24hqc
     */
     public function  testDangNhap24hqc()
    {
        $this-> browse(function(Browser $first){
            $first  ->visit('https://24hquangcao.com/')
                    ->click('#container > header > div.menu-top > div > div > div:nth-child(2) > ul > li:nth-child(4) > a')
                    ->pause(3000)
                    ->type('#username','linhbathai@gmail.com')
                    ->pause(500)
                    ->type('#password','23051998')
                    ->pause(500)
                    ->press('#container > section.sec-login > div > div > div:nth-child(1) > div.main-login.main-center > form > div:nth-child(3) > div > div.col-sm-4.plr5.text-right > button')
                    ->pause(4999);

        });
    }

     /**
     * @group dangbai24hqc
     */
    //gặp vấn đề capcha
    public function  testDangBai24hqc()
    {
        $this-> browse(function(Browser $first){
            $first  ->visit('https://24hquangcao.com/')
                    ->click('#container > header > div.menu-top > div > div > div:nth-child(2) > ul > li:nth-child(4) > a')
                    ->pause(3000)
                    ->type('#username','linhbathai@gmail.com')
                    ->pause(500)
                    ->type('#password','23051998')
                    ->pause(500)
                    ->press('#container > section.sec-login > div > div > div:nth-child(1) > div.main-login.main-center > form > div:nth-child(3) > div > div.col-sm-4.plr5.text-right > button')
                    ->pause(2000)
                    ->click('#container > header > div.top-header > div > div.row5 > div.col-md-9.col-80.plr0 > div.col-md-2.col-sm-3.plr5 > div > div.dang-tin > a')
                    ->pause(3000)
                    ->select('#danhmuc','582')
                    ->pause(500)
                    ->type('#frmDangTin > div:nth-child(2) > div > div > div:nth-child(3) > div > div.col-sm-9.plr5 > div > input','Dịch vụ du lịch Việt')
                    ->radio('#frmDangTin > div:nth-child(2) > div > div > div.list-dv > div.clearfix.frm-item.mb10 > div > div.col-sm-9.tin-right.plr5 > label:nth-child(2)','loaisp')
                    ->radio('#frmDangTin > div:nth-child(2) > div > div > div.list-dv > div.clearfix.frm-item.form-group > div > div.col-sm-9.tin-right.plr5 > label:nth-child(1)','loaitin')
                    ->pause(500)
                    ->select('#frmDangTin > div:nth-child(2) > div > div > div:nth-child(5) > div > div:nth-child(2) > select','79')
                    ->select('#frmDangTin > div:nth-child(2) > div > div > div:nth-child(5) > div > div:nth-child(4) > select','763')
                    ->pause(500)
                    ->type('#frmDangTin > div:nth-child(2) > div > div > div:nth-child(6) > div > div.col-sm-9.plr5 > div > input','Man Thiện, Hiệp Phú')
                    ->type('#Gia_cu','1500000')
                    ->pause(500)
                    ->type('#frmDangTin > div:nth-child(2) > div > div > div:nth-child(11) > div > div:nth-child(2) > input','Phạm Băng Băng')
                    ->type('#frmDangTin > div:nth-child(2) > div > div > div:nth-child(11) > div > div:nth-child(4) > input','0395608800')
                    ->pause(1000)
                    ->attach('#file',storage_path('app/public/images/g5.jpg'))
                    ->pause(900)
                    ->type('#new_editor_fix','Dịch vụ thông tin du lịch Việt Nam test thử thôi nha, không bán buôn gì hết eheheheh')
                    ->pause(555)
                    ->check('#myCheck')
                    ->pause(455476);
                    //check capcha bằng tay
                    // ->press('#submitBtn')
                    // ->pause(4999);

        });
    }

    //======================================================

// public function  testDangKy5s()
//     {
//         $this-> browse(function(Browser $first){
//             $first  ->visit('https://www.5giay.vn/')
//                     ->pause(2000)
//                     ->click('#loginBarHandle > label > a')
//                     ->pause(3000)
//                     ->click('#login > div > dl.ctrlUnit.custom_register > dd > a')
//                     ->pause(1000)
//                     // ->waitForDialog($seconds = 5000)
//                     // ->waitForReload ().
//                     // ->waitForDialog($seconds = null)

//                     ->type('#igo-new-register > .ctrlUnit.igo-phone-wrp >:input:visible:first',"20000")
//                     ->pause(50000);

//         });
//     }

}
