<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    function index(){
        $items=item::get();
        return view('/item',['items'=>$items]);
    }

    function show($id){
        $item = item::find($id);

        return view('/show',['item'=>$item]);
    }
}
