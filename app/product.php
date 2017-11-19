<?php

  namespace App;

  use Illuminate\Database\Eloquent\Model;
  use Carbon\Carbon;

  class product extends Model
{
    protected $fillable = ['price','product_name','product_description','category_id','status_id','top_ad','expiry_date','user_id'
    ];

    public function pictures(){
        
      return  $this->hasMany('App\picture');
    }

    public function category(){
        
      return  $this->belongsTo('App\category');
    }

    public function user(){
      return  $this->belongsTo('App\User');
  }
  
}

