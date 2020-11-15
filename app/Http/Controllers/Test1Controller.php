<?php

namespace App\Http\Controllers;
use Tests\Browser\ExampleTest;
use Illuminate\Http\Request;

$test = new ExampleTest();
class Test1Controller extends Controller
{
    public function test1(){
        $test->testDangBaiCT();
        return view("test1",['result'=>'']);
    }
    public function test2(){
        return view("test2",['result'=>'']);
    }
    public function add(Request $request){
        $a = $request->input('a');
        $b = $request->input('b');
        $result = intval($a) +intval($b);
        return view('test1',['result'=>$result]);
    }

}
