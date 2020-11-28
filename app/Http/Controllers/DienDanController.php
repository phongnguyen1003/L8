<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class DienDanController extends Controller
{
    public function xulydiendan(){
        $tendd = DB::table('diendan')->orderBy('id_dd','desc')->get();
        return view('pages.dangnhapdd')->with('abc',$tendd);
    }

}
