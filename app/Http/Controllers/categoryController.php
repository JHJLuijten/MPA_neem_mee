<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;

class categoryController extends Controller
{
    function categories(){
        $categories=categories::get();
        return view('/categories',['categories'=>$categories]);
    }
}
