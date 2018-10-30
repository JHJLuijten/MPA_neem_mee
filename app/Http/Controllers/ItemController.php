<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    function index(){
        $items=item::get();
        
        return view('/view1',['items'=>$items]);
    }
}
