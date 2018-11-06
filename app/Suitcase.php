<?php

namespace App;

class Suitcase{
    public $items;
    public $weightInGrams;
    public $quantity;

    public function add($id,$item){
        $itemAdd = ['qty' => 0, 'weight'=> $item->weightInGrams, 'item' => $item];
        $itemAdd['qty']++;
        $itemAdd['weight'] = $item->weightInGrams * $itemAdd['qty'];
        $this->items[$id] = $itemAdd;
        $this->quantity ++;
        $this->weightInGrams = $item->weightInGrams;
    }
}