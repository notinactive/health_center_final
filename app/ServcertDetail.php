<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServcertDetail extends Model
{
    protected $table = 'servcert_details';

    protected $fillabe = ['cert_id' , 'description' , 'count' , 'price']; 
} 
