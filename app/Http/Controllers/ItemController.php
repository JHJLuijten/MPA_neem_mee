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

    public function index(){
        $items=item::get();
        return view('/item',['items'=>$items]);
    }

    /**
     * shows a speific item
     */

    public function show($id){
        $item = item::find($id);
        $test = session::get('suitcase');
        return view('/show',['item'=>$item, 'test' => $test]);
    }

    /**
     * retrive items
     */
    public function retrieve(){
        
        $suitcase = new Suitcase();
        $items = $suitcase->retrieveItems();
        $details = $suitcase->getDetails();
        // dd($items);
        // dd($details);

    //    dd($items);
        // dd($itemRetrieved);
        return view('/items/suitcase',['items' => $items, 'details' => $details]);

    }

    public function minusOne($id){
        $suitcase = new Suitcase();
        $suitcase->minusOne($id);
        return redirect()->back();
    }
     
    public function minusAll($id){
        $suitcase = new Suitcase();
        $suitcase->minusAll($id);
        return redirect()->back();
    }

    public function toDatabase(){
        $suitcase = new Suitcase();
        $suitcase->toDatabase();
    }
    /**
     * Adds an item to the suitcase
     */
    
    public function addItem($id){
        $suitcase = new Suitcase();
        $suitcase->add($id);
        return redirect()->back();
    }

    /**
     * Gets items that are in the suitcase
     */

    // public function getSuitcase(){
    //     $suitcase = new Suitcase();
    //     // dd($suitcase->name);
    //     return view('/items/suitcase', ['name' => $suitcase->name, 'items' => $suitcase->items, 'weight' => $suitcase->weightInGrams, 'quantity' => $suitcase->quantity, 'maxWeight' => $suitcase->maxWeight]);
    // }

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
        $minus->minusItem($id);
        return redirect('/items/suitcase');
    }

    public function increaseWeight(){
        $suitcase = new Suitcase;
        $suitcase->increaseWeight();
        return redirect('/items/suitcase');
    }
    public function decreaseWeight(){
        $suitcase = new Suitcase;
        $suitcase->decreaseWeight();
        return redirect('/items/suitcase');
    }

    /**
     * function to give a name to a suitcase
     */
    public function giveName(Request $request){
        $suitcase = new Suitcase;
        $name = $request->input('name');
        $suitcase->nameInSession($name);
        return redirect('/items/suitcase');
    }

}
