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
    function show($id){
        $items=Category::find($id)->items()->get();


        return view('/show',['items'=>$items]);
    }
    
}
