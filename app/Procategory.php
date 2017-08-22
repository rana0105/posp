<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procategory extends Model
{
    public function products() {
    	return $this->hasMany('Product');
    }
}
