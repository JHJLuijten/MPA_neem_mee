<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    function items(){
        $items=item::get();
        return view('/home',['items'=>$items]);
    }
}
