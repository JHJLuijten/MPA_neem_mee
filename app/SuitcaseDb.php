<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuitcaseDb extends Model
{   
    protected $fillable = [
        'user_id',
        'name'
    ];
    protected $table = 'suitcase';
    public function user() {
        return $this->belongsTo('App\User');
      }
      public function details() {
        return $this->hasMany('App\SuitcaseDetail', 'suitcase_id');
      }
    
}
