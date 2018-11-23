<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Session;
use App\Suitcase;

class ItemController extends Controller
{

    /**
     * index shows all items
     */

    function index(){
        $items=item::get();
        return view('/item',['items'=>$items]);
    }

    /**
     * shows a speific item
     */

    function show($id){
        $item = item::find($id);
        $test = session::get('suitcase');
        return view('/show',['item'=>$item, 'test' => $test]);
    }

    /**
     * Adds an item to the suitcase
     */

    //sesions op juiste plek zetten
    public function addItem(Request $request, $id){
        $item = Item::find($id); 
        $usedSuitcase = Session::has('suitcase') ? Session::get('suitcase') : null;
        $suitcase = new Suitcase($usedSuitcase);
        $suitcase->add($id, $item);
        $request->session()->put('suitcase' , $suitcase);
        return redirect()->back();
    }

    /**
     * Gets items that are in the suitcase
     */

    public function getSuitcase(){
        $suitcase = new suitcase;
        $getSuitcase = $suitcase->getSuitcase();
        return view('/items/suitcase', ['items' => $getSuitcase->items, 'weight' => $getSuitcase->weightInGrams, 'quantity' => $getSuitcase->quantity, 'maxWeight' => $suitcase->maxWeight]);
    }

    /**
     * Removes item 
     */

    public function removeItem($id){
        $test = new Suitcase;
        $test->removeItemFromSession($id);
        return redirect('/items/suitcase'); 
    }
    
    /**
     * function to delete one or more from an item qty 
     */
    public function minusItem($id){
        $minus = new Suitcase;
        $minus->minus($id);
        return redirect('/items/suitcase');
    }

    public function increaseWeight(){
        $test = new Suitcase;
        $test->increaseWeight($id);
        return view('/items/suitcase');
    }

}
