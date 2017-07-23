<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sreq;
use App\Preq;
use App\Ticket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      auth()->loginUsingId(1);
      $tickets = Ticket::where('seen' , 0)->count();
      $products = Preq::where('seen' , 0)->count();
      $services = Sreq::where('seen' , 0)->count();
      $complete1 = Sreq::where('state_req' , 7)->count();
      $reject1 = Sreq::where('reject' , 1)->count();
      $current1 = Sreq::where([
                ['reject', '=', 0],                
                ['state_req','!=', 6],
                ['state_req', '!=' , 0],
                ['cancel_confirm', '=', 0]
            ])->count();
      $new1 = Sreq::where('state_req' , 0)->count();

      $complete2 = Preq::where('state_req' , 7)->count();
      $reject2 = Preq::where('reject' , 1)->count();
      $current2 = Preq::where([
                ['reject', '=', 0],                
                ['state_req','!=', 6],
                ['state_req', '!=' , 0],
                ['cancel_confirm', '=', 0]
            ])->count();
      $new2 = Preq::where('state_req' , 0)->count();

      //////////////////////////////////////////////////////////////////////////
      $notseen_ticket = Ticket::where('seen' , 0)->count();
      $notanswer_ticket = Ticket::where('reply_code' , 0)->count();
      $seen_ticket = Ticket::where('seen' , 1)->count();
      $answer_ticket = Ticket::where('reply_code' , 1)->count();

      return view('index' , compact('tickets' , 'products' , 'services' , 'complete1','reject1','current1' , 'new1' , 'complete2','reject2','current2' , 'new2' , 'notseen_ticket' , 'notanswer_ticket' , 'seen_ticket' , 'answer_ticket'));
    }
     public function welcome()
    {
        return view('index');
    }

      public function ticket()
    {
        $tickets = Ticket::orderby('id' , 'DESC')->paginate(10);
        return view('ticket' , compact('tickets'));
    }

     public function new_index()
    {
      $fservices = Sreq::where([
                ['confirm', '=', 1],                               
                
            ])->count();

      $fproducts = Preq::where([
                ['confirm', '=', 1],                               
                
            ])->count();

      $final_total = $fservices + $fproducts;

      $tservice = Sreq::count();
      $tproduct = Preq::count();
      $total = $tservice + $tproduct;

      $final = round(($final_total / $total)*100);

//////////////////////////////////////////////////////////////////////////////////////////

       $rservices = Sreq::where([
                ['confirm', '=', 1],
                ['reject', '=', 1],                
                ['state_req','!=', 6],
                ['reject_code', '!=' , 0]
            ])->count();

      $rproducts = Preq::where([
                ['confirm', '=', 1],
                ['reject', '=', 1],                
                ['state_req','!=', 6],
                ['reject_code', '!=' , 0]
            ])->count();

      $reject_total = $rservices + $rproducts;

      $reject = round(($reject_total / $total)*100);

//////////////////////////////////////////////////////////////////////////////////////////      

      $confservices = Sreq::where([
                ['confirm', '=', 1],
                ['reject', '=', 0],                
                ['state_req', 6],
                ['cancel', 0]
            ])->count();

      $confproducts = Preq::where([
                ['confirm', '=', 1],
                ['reject', '=', 0],                
                ['state_req', 6],
                ['cancel', 0]
            ])->count();

      $confirm_total = $confservices + $confproducts;

      $confirm = round(($confirm_total / $total)*100);

//////////////////////////////////////////////////////////////////////////////////////////

      $processservices = Sreq::where([
                ['confirm', '=', 1],
                ['reject', '=', 0],
                ['state_req', '!=', 0],
                ['state_req', '!=', 6]
            ])->count();

      $processproducts = Preq::where([
                ['confirm', '=', 1],
                ['reject', '=', 0],
                ['state_req', '!=', 0],
                ['state_req', '!=', 6]
            ])->count();

      $process_total = $processservices + $processproducts;

      $process = round(($process_total / $total)*100);

      ////////////////////////////////////////////////////////////////////////////

      $ttotal = Ticket::count();

        $seen = Ticket::where('seen' , 0)->count();
        $notseen = round(($seen / $ttotal)*100);
        //////////////////////////////////////////////////////////////////
        $now = Ticket::where([
                ['reply_code', '=', 1],
                ['seen', '=', 1]
            ])->count();
        $answer = round(($now / $ttotal)*100);
        //////////////////////////////////////////////////////////////////
        $expire = Ticket::where([
                ['reply_code', '=', 0],
                ['seen', '=', 1]
            ])->count();
        $notanswer = round(($expire / $ttotal)*100);
      ////////////////////////////////////////////////////////////////////////////////////////////

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
        //////////////////////////////////////////////////////////////////
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

      return view('clients.index' , ['final' => $final , 'reject' => $reject , 'confirm' => $confirm , 'process' => $process , 'notseen' => $notseen, 'answer' => $answer , 'notanswer' => $notanswer , 'cancel_confirm' => $cancel_confirm , 'current' => $current]);
    }

    public function details()
    {
       $fservices = Sreq::where([
                ['confirm', '=', 1],                               
                
            ])->count();

      $fproducts = Preq::where([
                ['confirm', '=', 1],                               
                
            ])->count();

      $final_total = $fservices + $fproducts;

      $tservice = Sreq::count();
      $tproduct = Preq::count();
      $total = $tservice + $tproduct;

      $final = round(($final_total / $total)*100);

//////////////////////////////////////////////////////////////////////////////////////////

      $rservices = Sreq::where([
                ['confirm', '=', 1],
                ['reject', '=', 1],                
                ['state_req','!=', 6],
                ['reject_code', '!=' , 0]
            ])->count();

      $rproducts = Preq::where([
                ['confirm', '=', 1],
                ['reject', '=', 1],                
                ['state_req','!=', 6],
                ['reject_code', '!=' , 0]
            ])->count();

      $reject_total = $rservices + $rproducts;

      $reject = round(($reject_total / $total)*100);

//////////////////////////////////////////////////////////////////////////////////////////      

      $confservices = Sreq::where([
                ['confirm', '=', 1],
                ['reject', '=', 0],                
                ['state_req', 6],
                ['cancel', 0]
            ])->count();

      $confproducts = Preq::where([
                ['confirm', '=', 1],
                ['reject', '=', 0],                
                ['state_req', 6],
                ['cancel', 0]
            ])->count();

      $confirm_total = $confservices + $confproducts;

      $confirm = round(($confirm_total / $total)*100);

//////////////////////////////////////////////////////////////////////////////////////////

      $processservices = Sreq::where([
                ['confirm', '=', 1],
                ['reject', '=', 0],
                ['state_req', '!=', 0],
                ['state_req', '!=', 6]
            ])->count();

      $processproducts = Preq::where([
                ['confirm', '=', 1],
                ['reject', '=', 0],
                ['state_req', '!=', 0],
                ['state_req', '!=', 6]
            ])->count();

      $process_total = $processservices + $processproducts;

      $process = round(($process_total / $total)*100);


      return view('clients.details' , ['final' => $final , 'reject' => $reject , 'confirm' => $confirm , 'process' => $process]);
    }

    public function reject_service()
    {
      return view('reject_service');
    }

     public function reject_product()
    {
      return view('reject_product');
    }

    public function notcheck_service()
    {
      return view('notcheck_service');
    }

    public function notcheck_product()
    {
      return view('notcheck_product');
    }
   
}
