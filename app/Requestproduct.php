<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requestproduct extends Model
{
     protected $table = 'requestproduct';
    protected $fillable= ['preqs_id','products_id','count','description','fi','price']; 
}
