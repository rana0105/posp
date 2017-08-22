<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    public function expenses() {
       return $this->hasMany('Expense');
    }
}
