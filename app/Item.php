<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public function category() {
        return $this->belongsToMany('App\Category', 'item_category', 'item_id','category_id')->withPivot('category_id', 'item_id');
    }
}
