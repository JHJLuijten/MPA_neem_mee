<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    function categories(){
        $categories=category::get();
        return view('/categories',['categories'=>$categories]);
    }
}
