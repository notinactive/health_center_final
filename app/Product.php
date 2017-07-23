<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable= ['name','description']; 

    public function preqs ()
    {
    	return $this -> belonsToMany('App\Preq');
    }
}
