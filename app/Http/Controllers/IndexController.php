<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show( ) {
        $def['OccuName'] = array("일반"=>"일반","간호사"=>"간호사","의사" => "의사" );

        return view("test123")->with("def",$def);
    }

    public function index(){

        $def['OccuName'] = array("일반"=>"일반","간호사"=>"간호사","의사" => "의사" );

        return view("test")->with("def",$def);

    }

}
