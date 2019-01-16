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
        $categories=Category::all();
        
        return view('/category/index',['categories'=>$categories]);
    }

    /**
     * show an category with the items that are in it
     * $item=Category::find($id)->items()->get(); in deze regel word het er ingezet
     * return view('/show',['item'=>$item]); en hier leid die hem naar de show 
     */
    function show($id){
        $category =Category::find($id);   
        $items = $category->items()->get();
        
        return view('/category/show',['items'=>$items]);
    }
    
}
