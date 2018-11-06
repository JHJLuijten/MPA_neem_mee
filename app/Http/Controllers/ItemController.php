<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Session;
use App\Suitcase;

class ItemController extends Controller
{
    function index(){
        $items=item::get();
        return view('/item',['items'=>$items]);
    }

    function show($id){
        $item = item::find($id);
        $test = session::get('suitcase');
        return view('/show',['item'=>$item, 'test' => $test]);
    }
    public function addItem(Request $request, $id){
       
        $item = Item::find($id); 
        $suitcase = new Suitcase;
        $suitcase->add($id, $item);
       $request->session()->put('suitcase' , $suitcase);
        return redirect()->back();
    }
}
