<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mainunit extends Model
{
    protected $table = 'mainunits';
    protected $fillable= ['country','province','city','code','address','phone']; 

}
