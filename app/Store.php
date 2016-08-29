<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function menus()
    {
    	return $this->hasMany('App\Menu');	
    }

    public function boards()
    {
    	return $this->hasMany('App\Board');		
    }
}
