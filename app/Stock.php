<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
     public function products() 
    {
    	return $this->belongsTo('App\Product','product_id');
    }

     public function purchases() 
    {
    	return $this->belongsToMany('Purchase');
    }
}
