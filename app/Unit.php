<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $table = 'units';
    protected $fillable= ['mainunit_id','unitname','phone','description']; 

    public function tickets()
    {
    	return $this->hasMany('App\Ticket');
    }
    
}
