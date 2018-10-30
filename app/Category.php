<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function items() {
      return $this->belongsToMany('App\Home', 'category_event', 'category_id')->withPivot('category_id', 'event_id');
  }
}
