<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Preq extends Model
{
    protected $table = 'preqs';
    protected $fillable= ['codepaygiry','codesefaresh','unitname','state_req','confirm','reject','reject_code','reject_desc','cancel','cancel_confirm','cancel_date','cancel_confirm_date','cancel_reject_date','seen','certificate']; 

    public function products ()
    {
    	return $this -> belonsToMany('App\Product');
    }
}
