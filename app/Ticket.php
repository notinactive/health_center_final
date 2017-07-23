<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
      protected $table = 'tickets';
    protected $fillable= ['ticket_num','codepaygiry','title','content','unit_id','olaviat','seen','reply_code','reply','reply_date'];   

    public function unit()
    {
    	return $this->belongsTo('App\Unit');
    } 
}
