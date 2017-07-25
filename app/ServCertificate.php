<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServCertificate extends Model
{
	protected $table = 'serv_certificates';
    protected $fillable = ['cert_num','state_cert','request_id','unit_id','unit_confirm_state'];

    public function sreq()
    {
    	return $this->belongsTo('App\Sreq');
    }

}
