<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function items() {
      return $this->belongsToMany('App\Item', 'items_categories', 'category_id')->withPivot('category_id','item_id');
  }
} 
