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
        $usedSuitcase = Session::has('suitcase') ? Session::get('suitcase') : null;
        $suitcase = new Suitcase($usedSuitcase);
        $suitcase->add($id, $item);
        $request->session()->put('suitcase' , $suitcase);
        return redirect()->back();
    }
    public function getSuitcase(){
        $suitcase = new suitcase;
        $getSuitcase = $suitcase->getSuitcase();
        return view('/items/suitcase', ['items' => $getSuitcase->items, 'weight' => $getSuitcase->weightInGrams, 'quantity' => $getSuitcase->quantity]);
    }
}
