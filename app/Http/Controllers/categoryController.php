<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    function categories(){
        $categories=category::all();
        return view('/categories',['categories'=>$categories]);
    }
}
