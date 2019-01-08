<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuitcaseDetail extends Model
{
    protected $fillable = [
        'suitcase_id',
        'item_id',
        'quantity',
    ];
    protected $table = 'suitcase_detail';

    public function item() {
        return $this->belongsTo('App\Item', 'item_id');
      }
}
