<?php

namespace App;
use Session;

class Suitcase{
    public $items;
    public $weightInGrams;
    public $quantity;
    public $maxWeight = 20000;
    

    /**
     * gets items and puts them in the public var
     */

    public function __construct($usedSuitcase = []){
        if ($usedSuitcase){
            $this->items = $usedSuitcase->items;
            $this->weightInGrams = $usedSuitcase->weightInGrams;
            $this->quantity = $usedSuitcase->quantity;
            
        }
    }

    /**
     * adds item to suitcase
     */

    public function add($id,$item){
        $itemAdd = ['qty' => 0, 'weight'=> $item->weightInGrams, 'item' => $item];
        if($this->items){
            if(array_key_exists($id, $this->items)){
                $itemAdd = $this->items[$id];
            }
        }
        $itemAdd['qty']++;
        $itemAdd['weight'] = $item->weightInGrams * $itemAdd['qty'];
        $this->items[$id] = $itemAdd;
        $this->quantity++;
        $this->weightInGrams += $item->weightInGrams;
    }

    public function minus($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['weight'] -= $this->items[$id]['item']['weight']; 
        $this->quantity--;
        $this->weightInGrams -= $this->items[$id]['weight'];    
        if($items[$id]['qty'] == 0 ){
            unset($this->items[$id]);
        }
    }
 
    public function minusItem($id){
        $usedSuitcase = Session::get('suitcase');
        $suitcase = new suitcase($usedSuitcase);
        $suitcase->minusItem($id);
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

    /**
     * get suitcase and shows items
     */

    public function getSuitcase(){
        if (!Session::get('suitcase')){
            return view ('items/suitcase');
        };
        $usedSuitcase = Session::get('suitcase');
        $suitcase = new Suitcase($usedSuitcase);
        return $suitcase;
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

}