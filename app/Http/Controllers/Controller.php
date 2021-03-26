<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function show( ) {
        $def['OccuName'] = array("일반"=>"일반","간호사"=>"간호사","의사" => "의사" );

        return view("test123")->with("def",$def);
    }

    public function index(){

        $def['OccuName'] = array("일반"=>"일반","간호사"=>"간호사","의사" => "의사" );

        return view("test")->with("def",$def);

    }



}
