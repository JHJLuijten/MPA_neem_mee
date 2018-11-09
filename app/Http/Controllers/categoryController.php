<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    /**
     * shows all categories
     */

    function categories(){
        $categories=category::all();
        
        return view('/categories',['categories'=>$categories]);
    }

    /**
     * show an category with the items that are in it
     */
    function show($id){
        $items=Category::find($id)->items()->get();
        
        return view('/show',['items'=>$items]);
    }
    
}
