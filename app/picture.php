<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class picture extends Model
{
    protected $fillable = ['url','product_id'];

    public function product(){
        
      return  $this->belongsTo('App\product');
    }
}
