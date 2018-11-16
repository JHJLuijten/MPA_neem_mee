<?php

namespace App;
use Session;

class Suitcase{
    public $items;
    public $weightInGrams;
    public $quantity;

    public function __construct($usedSuitcase = []){
        if ($usedSuitcase){
            $this->items = $usedSuitcase->items;
            $this->weightInGrams = $usedSuitcase->weightInGrams;
            $this->quantity = $usedSuitcase->quantity;
        }
    }

    public function add($id,$item){
        $itemAdd = ['qty' => 0, 'weight'=> $item->weightInGrams, 'item' => $item->name];
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
        $this->qauntity -= $this->items[$id]['qty'];
        $this->weightInGrams -= $this->items[$id]['weight'];
        unset($this->items[$id]);
    }
    
    public function removeItemFromSession($id){
        $usedSuitcase = Session::get('suitcase');
        $suitcase = new suitcase($usedSuitcase);
        $suitcase->minus($id);
        if(count($suitcase->items) > 0){
            Session::put('suitcase',$suitcase);
            
        }else{
            Session::forget('suitcase');
        }
    }

    public function getSuitcase(){
        if (!Session::get('suitcase')){
            return view ('items/suitcase');
        };
        $usedSuitcase = Session::get('suitcase');
        $suitcase = new Suitcase($usedSuitcase);
        return $suitcase;
    }
}