<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sreq extends Model
{
    protected $table = 'sreqs';
    protected $fillable= ['codepaygiry','codesefaresh','unitname','state_req','confirm','reject','reject_code','reject_desc','cancel','cancel_confirm','cancel_date','cancel_confirm_date','cancel_reject_date','seen','certificate']; 

    public function services ()
    {
    	return $this -> belongsToMany('App\Service');
    }

     public function serv_certificates()
    {
    	return $this->hasMany('App\ServCertificate');
    }
}
