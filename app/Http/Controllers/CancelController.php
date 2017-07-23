<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sreq;
use App\Preq;
use App\Requestservice;
use App\Requestproduct;


class CancelController extends Controller
{
    public function details()
    {    
    	$tservice = Sreq::count();
        $tproduct = Preq::count();
        $total = $tservice + $tproduct;
        ////////////////////////////////////////////////////////////////////
         $cancel_services = Sreq::where([
                ['cancel_confirm', '=', 1],
                ['cancel', '=', 1]
            ])->count();

        $cancel_products = Preq::where([
                ['cancel_confirm', '=', 1],
                ['cancel', '=', 1]
            ])->count();

        $total_req = $cancel_services + $cancel_products;
        $cancel_confirm = round(($total_req / $total)*100);
        ////////////////////////////////////////////////////////////////
        $current_services = Sreq::where([
                ['cancel_confirm', '=', 0],
                ['cancel', '=', 1]
            ])->count();

        $current_products = Preq::where([
                ['cancel_confirm', '=', 0],
                ['cancel', '=', 1]
            ])->count();

        $total_current = $current_products + $current_services;
        $current = round(($total_current / $total)*100);
        //////////////////////////////////////////////////////////////////
        $reject_services = Sreq::where([
                ['cancel_confirm', '=', 2],
                ['cancel', '=', 1]
            ])->count();

        $reject_products = Preq::where([
                ['cancel_confirm', '=', 2],
                ['cancel', '=', 1]
            ])->count();

        $total_reject = $reject_services + $reject_products;
        $reject = round(($total_reject / $total)*100);


    	return view('clients.cancel_details' , compact('reject' , 'current' , 'cancel_confirm'));
    }
///////////////////////////////////////////////////////////////////////////////////////////
    public function show()
    {    
    	return view('clients.cancel_show');
    }
///////////////////////////////////////////////////////////////////////////////////////////
    public function sconfirm()
    {
    	$cancel_confirms = Sreq::where([
                ['cancel_confirm', '=', 1],
                ['cancel', '=', 1]
            ])->paginate(10);

    	return view('clients.cancel_reqs.service_cconfirm' , compact('cancel_confirms'));
    }

    public function confirm1($id)
    {
    	$confirms = Sreq::find($id);
    	$confirm1 = Requestservice::where('sreqs_id' , $id)->get();
    	return view('clients.cancel_reqs.details.confirm1' , compact('confirms' , 'confirm1'));
    }
//////////////////////////////////////////////////////////////////////////////////////////
    public function pconfirm()
    {
    	$cancel_confirms = Preq::where([
                ['cancel_confirm', '=', 1],
                ['cancel', '=', 1]
            ])->paginate(10);

    	return view('clients.cancel_reqs.product_cconfirm' , compact('cancel_confirms'));
    }

    public function confirm2($id)
    {
    	$confirms = Preq::find($id);
    	$confirm1 = Requestproduct::where('preqs_id' , $id)->get();
    	return view('clients.cancel_reqs.details.confirm2' , compact('confirms' , 'confirm1'));
    }
/////////////////////////////////////////////////////////////////////////////////////////////////    
    public function scurrent()
    {
    	$cancel_confirms = Sreq::where([
                ['cancel_confirm', '=', 0],
                ['cancel', '=', 1]
            ])->paginate(10);

    	return view('clients.cancel_reqs.service_ccurrent' , compact('cancel_confirms'));
    }

    public function current1($id)
    {
    	$confirms = Sreq::find($id);
    	$confirm1 = Requestservice::where('sreqs_id' , $id)->get();
    	return view('clients.cancel_reqs.details.current1' , compact('confirms' , 'confirm1'));
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    public function pcurrent()
    {
    	$cancel_confirms = Preq::where([
                ['cancel_confirm', '=', 0],
                ['cancel', '=', 1]
            ])->paginate(10);

    	return view('clients.cancel_reqs.product_ccurrent' , compact('cancel_confirms'));
    }

     public function current2($id)
    {
    	$confirms = Preq::find($id);
    	$confirm1 = Requestproduct::where('preqs_id' , $id)->get();
    	return view('clients.cancel_reqs.details.current2' , compact('confirms' , 'confirm1'));
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
     public function sreject()
    {
    	$cancel_confirms = Sreq::where([
                ['cancel_confirm', '=', 2],
                ['cancel', '=', 1]
            ])->paginate(10);

    	return view('clients.cancel_reqs.service_creject' , compact('cancel_confirms'));
    }

    public function reject1($id)
    {
    	$confirms = Sreq::find($id);
    	$confirm1 = Requestservice::where('sreqs_id' , $id)->get();
    	return view('clients.cancel_reqs.details.reject1' , compact('confirms' , 'confirm1'));
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    public function preject()
    {
    	$cancel_confirms = Preq::where([
                ['cancel_confirm', '=', 2],
                ['cancel', '=', 1]
            ])->paginate(10);

    	return view('clients.cancel_reqs.product_creject' , compact('cancel_confirms'));
    }

    public function reject2($id)
    {
    	$confirms = Preq::find($id);
    	$confirm1 = Requestproduct::where('preqs_id' , $id)->get();
    	return view('clients.cancel_reqs.details.reject2' , compact('confirms' , 'confirm1'));
    }
}
