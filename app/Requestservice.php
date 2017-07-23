<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requestservice extends Model
{
     protected $table = 'requestservice';
    protected $fillable= ['sreqs_id','services_id','count','description','fi','price'];
}
