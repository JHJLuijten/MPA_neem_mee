<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\objects;

class objectController extends Controller
{
    function objects(){
        $objects=objects::get();
        return view('/home',['objects'=>$objects]);
    }
}
