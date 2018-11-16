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
     * $item=Category::find($id)->items()->get(); in deze regel word het er ingezet
     * return view('/show',['item'=>$item]); en hier leid die hem naar de show 
     */
    function show($id){
        $item=Category::find($id);
        $test = $item->items()->get();
        
        return view('/show',['item'=>$item]);
    }
    
}
