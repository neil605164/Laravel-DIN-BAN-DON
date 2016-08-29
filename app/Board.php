<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    public function members()
    {
    	return $this->hasMany('App\Member');		
    }

    public function store()
    {
    	return $this->belongsTo('App\Store');	
    }
}
