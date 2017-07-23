<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sreq;
use App\Preq;
use App\Requestservice;
use App\Requestproduct;

class RequestController extends Controller
{
   public function process_pro()
   {
   	$products = Preq::where([
                ['confirm', '=', 1],
                ['reject', '=', 0],
                ['state_req', '!=', 0],
                ['state_req', '!=', 6]
            ])->paginate(5);

   	return view ('clients.requests.process_pro' , compact('products'));
   }

    public function confirm_pro()
   {
   	$products = Preq::where([
                ['confirm', '=', 1],
                ['reject', '=', 0],                
                ['state_req', 6],
                ['cancel', 0]
            ])->paginate(5);

   	return view ('clients.requests.confirm_pro' , compact('products'));
   }

    public function reject_pro()
   {
   	$products = Preq::where([
                ['confirm', '=', 1],
                ['reject', '=', 1],                
                ['state_req','!=', 6],
                ['reject_code', '!=' , 0]                
            ])->paginate(5);

   	return view ('clients.requests.reject_pro' , compact('products'));
   }

    public function final_pro()
   {
   	$products = Preq::where([
                ['confirm', '=', 1],                               
                
            ])->paginate(5);

   	return view ('clients.requests.final_pro' , compact('products'));
   }

////////////////////////////////////////////////////////////////////////////////////////

    public function process_serv()
   {
   	$services = Sreq::where([
                ['confirm', '=', 1],
                ['reject', '=', 0],
                ['state_req', '!=', 0],
                ['state_req', '!=', 6]
            ])->paginate(5);
   	
   	return view ('clients.requests.process_serv' , ['services' => $services]);
   }

    public function confirm_serv()
   {
   	$services = Sreq::where([
                ['confirm', '=', 1],
                ['reject', '=', 0],                
                ['state_req', 6],
                ['cancel', 0]

            ])->paginate(5);

   	return view ('clients.requests.confirm_serv' , compact('services'));
   }

    public function reject_serv()
   {
   	$services = Sreq::where([
                ['confirm', '=', 1],
                ['reject', '=', 1],                
                ['state_req','!=', 6],
                ['reject_code', '!=' , 0]                
            ])->paginate(5);

   	return view ('clients.requests.reject_serv' , compact('services'));
   }

    public function final_service()
   {
   	$services = Sreq::where([
                ['confirm', '=', 1],                               
                
            ])->paginate(5);

   	return view ('clients.requests.final_service' , compact('services'));
   }

//////////////////////////////////////////////////////////////////////////////////////
   public function process1($id)
   {
   	$service = Sreq::where('id', $id)->first();
   	$details = Requestservice::where('sreqs_id' , $id)->get();
   	return view('clients.requests.details.process1' , ['details' => $details , 'service' => $service]);
   }

    public function process2($id)
   {
   	$product = Preq::where('id', $id)->first();
   	$details = Requestproduct::where('preqs_id' , $id)->get();
   	return view('clients.requests.details.process2' , ['details' => $details , 'product' => $product]);
   }
/////////////////////////////////////////////////////////////////////////////////////////
    public function confirm1($id)
   {
   	$service = Sreq::where('id', $id)->first();
   	$details = Requestservice::where('sreqs_id' , $id)->get();
   	return view('clients.requests.details.confirm1' , ['details' => $details , 'service' => $service]);
   }

   public function confirm2($id)
   {
   	$product = Preq::where('id', $id)->first();
   	$details = Requestproduct::where('preqs_id' , $id)->get();
   	return view('clients.requests.details.confirm2' , ['details' => $details , 'product' => $product]);
   }
//////////////////////////////////////////////////////////////////////////////////////////////
   public function reject1($id)
   {
   	$service = Sreq::where('id', $id)->first();
   	$details = Requestservice::where('sreqs_id' , $id)->get();
   	return view('clients.requests.details.reject1' , ['details' => $details , 'service' => $service]);
   }

   public function reject2($id)
   {
   	$product = Preq::where('id', $id)->first();
   	$details = Requestproduct::where('preqs_id' , $id)->get();
   	return view('clients.requests.details.reject2' , ['details' => $details , 'product' => $product]);
   }
//////////////////////////////////////////////////////////////////////////////////////////////////
   public function final1($id)
   {
   	$service = Sreq::where('id', $id)->first();
   	$details = Requestservice::where('sreqs_id' , $id)->get();
   	return view('clients.requests.details.final1' , ['details' => $details , 'service' => $service]);
   }

    public function final2($id)
   {
   	$product = Preq::where('id', $id)->first();
   	$details = Requestproduct::where('preqs_id' , $id)->get();
   	return view('clients.requests.details.final2' , ['details' => $details , 'product' => $product]);
   }
}
