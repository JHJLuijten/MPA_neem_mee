<?php

namespace App;
use Session;
use App\Item;

class Suitcase{
    protected $name;
    protected $items;
    protected $weightInGrams;
    protected $quantity;
    protected $maxWeight = 20000;

    /**
     * gets items and puts them in the public var
     */

    public function __construct(){
        $usedSuitcase = Session::get('suitcase');
        $this->items = session()->get('suitcase');
        if(empty($this->items)){
            $this->items = [];
        }
        if ($usedSuitcase) {
            $this->name = $usedSuitcase->name;
            $this->items = $usedSuitcase->items;
            $this->weightInGrams = $usedSuitcase->weightInGrams;
            $this->quantity = $usedSuitcase->quantity;
        }
    }

    /**
     * adds item to suitcase
     * $item haalt het item met het id dat die mee geeft op
     * dan checkt die met een if else of er iets in zit met isset
     * je klikt op een link en die geeft een id mee aan een function in de controller
     * nieuw var $savedItem daar slaan we het item op
     */

    public function add($id){
        $item = Item::find($id);
        if (isset($this->items[$id])){
            $savedItem = $this->items[$id];
        } else {
            $savedItem = ['qty' => 0 , 'id' => $id];
        }
        $savedItem['qty']++;
        $this->items[$id] = $savedItem;
        session()->put('items' , $this->items);
        $session = session()->get('items');
        
    }

    public function retrieveItems(){
        
        $items = $this->items;
        return $items;
    }

    public function minus($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['weight'] -= $this->items[$id]['item']['weightInGrams']; 
        $this->quantity--;
        $this->weightInGrams -= $this->items[$id]['weight'];    
        if($this->items[$id]['qty'] <= 0 ){
            unset($this->items[$id]);
        }
    }
 
    public function minusItem($id){
        $usedSuitcase = Session::get('suitcase');
        $suitcase = new suitcase($usedSuitcase);
        $suitcase->minus($id);
        if(count($suitcase->items) > 0){
            Session::put('suitcase',$suitcase);
        }else{
            Session::forget('suitcase');
        }
        
    }

    /**
     * removes item
     */
    public function removeItem($id){


        $this->quantity -= $this->items[$id]['qty'];
        $this->weightInGrams -= $this->items[$id]['weight'];
        unset($this->items[$id]);
    }

    /**
     * removes item from sesion
     */
    
    public function removeItemFromSession($id){
        $usedSuitcase = Session::get('suitcase');
        $suitcase = new suitcase($usedSuitcase);
        $suitcase->removeItem($id);
        if(count($suitcase->items) > 0){
            Session::put('suitcase',$suitcase);
            
        }else{
            Session::forget('suitcase');
        }
    }

    public function increaseWeight(){
        if($this->maxWeight <= 20000 ){
            $this->maxWeight + 5000 ;
        }  
    }

    public function decreaseWeight(){
        if($this->maxWeight >= 20000 ){
            $this->maxWeight - 5000 ;
        }
    }

    public function giveName($name){
        $this->name = $name;
        Session::put('name',$name);
        
    }
    public function nameInSession($name) {
        $usedSuitcase = Session::get('suitcase');
        $suitcase = new suitcase($usedSuitcase);
        $suitcase->giveName($name);
        session(['name' => $name]);
    }
}