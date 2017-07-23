<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
     protected $table = 'services';
    protected $fillable= ['name','description']; 

    public function sreqs ()
    {
    	return $this -> belongsToMany('App\Sreq');
    }
}
