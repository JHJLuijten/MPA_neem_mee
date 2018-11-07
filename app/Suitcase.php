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
        $itemAdd['qty']++;
        $itemAdd['weight'] = $item->weightInGrams * $itemAdd['qty'];
        $this->items[$id] = $itemAdd;
        $this->quantity ++;
        $this->weightInGrams = $item->weightInGrams;
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