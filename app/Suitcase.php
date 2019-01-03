<?php

namespace App;
use Session;
use App\Item;

class Suitcase{
    public $name;
    protected $items;
    protected $maxWeight = 20000;

    /**
     * gets items and puts them in the public var
     */

    public function __construct(){
        $maxWeight = session()->get('maxWeight');
        if($maxWeight == 20000) {
        Session::put('maxWeight',$this->maxWeight);
        } else {
            $this->maxWeight = $maxWeight;
        }
        // dd($maxWeight);
        // $usedSuitcase = Session::get('suitcase');
        $this->items = session()->get('items');
        if(empty($this->items)){
            $this->items = [];
        }
        // if ($usedSuitcase) {
        //     $this->name = $usedSuitcase->name;
        //     $this->items = $usedSuitcase->items;
        //     $this->weightInGrams = $usedSuitcase->weightInGrams;
        //     $this->quantity = $usedSuitcase->quantity;
        // }
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
        
        
    }
    public function minusOne($id){
        foreach($this->items as $item){
            if($item['id'] == $id){
                $item['qty']--; 
                if($item['qty'] == 0 ){
                    session()->forget('items.'.$item['id']);
                    break;
                    dd("dajdai");
                }
                $this->items[$id] = $item;
                // dd($item['qty']);
                session()->put('items', $this->items);
            }

        }
    }

    public function minusAll($id){
        foreach($this->items as $item){
            if($item['id'] == $id){
                session()->forget('items.'.$item['id']);    
            }
        }
    }
    public function toDatabase(){
        echo "gelukt";
    }


    public function retrieveItems(){
        if($this->items == null) {
            return null;
        } 
        foreach($this->items as $item) {
            $itemDb = item::find($item['id']);
            $items[] = $itemDb;
        }
        return array($items, $this->items);
    }
    public function getDetails() {
        if($this->items == null) {
            return null;
        } 
        foreach($this->items as $item) {
            $itemDb = item::find($item['id']);
            $quantity[] = $item['qty'];
            $weight[] = $item['qty'] * $itemDb->weightInGrams;
        }   
        $maxWeight = session()->get('maxWeight');
        if($maxWeight)  {
            $maxWeight = session()->get('maxWeight');
        } else {
            $maxWeight = $this->maxWeight;
        }       
            $totalQty = array_sum($quantity);
            $totalWeight = array_sum($weight);
            return array($totalQty,$totalWeight, $maxWeight);
    }

    public function retrieveName(){
        foreach($this->items as $item){
            $itemData =  Item::find($item['id']);
            $items[] = $itemData;
        }
        return $items;
    }

  
    public function increaseWeight(){
        if($this->maxWeight <= 20000 ){
            $this->maxWeight += 5000 ;
            session()->put('maxWeight',$this->maxWeight);
        }  
    }

    public function decreaseWeight(){
        if($this->maxWeight >= 20000 ){
            $this->maxWeight -= 5000 ;
            session()->put('maxWeight',$this->maxWeight);
        }
    }

    public function giveName($name){
        $this->name = $name;
        Session::put('name',$name);
        
    }
}