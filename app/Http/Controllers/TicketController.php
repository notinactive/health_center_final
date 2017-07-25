<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketRequest;
use App\Http\Requests\TicketAnswerRequest;
use App\Ticket;
use Carbon\Carbon;
use App\User;
use Session;
use Verta;

class TicketController extends Controller
{
	public function index()
	{
		$tickets = Ticket::orderby('id' , 'DESC')->paginate(5);

		return view('clients.ticket_show' , compact('tickets'));
	}

    public function create()
    {
    	return view('clients.ticket');
    }

    public function store(TicketRequest $request)
    {
    	$ticket = new Ticket($request->all());
    	$ticket->ticket_num =time();
    	$ticket->codepaygiry = 'Ticket-'.time();
        $user_id = auth()->user()->id;
        $ticket->seen = 0;
        $unit_id = User::where('id' , $user_id)->first()['unit'];
        $ticket->unit_id = $unit_id;

    	if($ticket->save())
    	{
            session()->flash('user_message' , 'تیکت شما با موفقیت برای واحد تدارکات ارسال گردید .'); 
    		return redirect('client/ticket_show');
    	}
    }

    public function ticket_details()
    {
        $total = Ticket::count();

        $seen = Ticket::where('seen' , 0)->count();
        $notseen = round(($seen / $total)*100);
        //////////////////////////////////////////////////////////////////
        $now = Ticket::where('reply_code' , 1)->count();
        $answer = round(($now / $total)*100);
        //////////////////////////////////////////////////////////////////
        $expire = Ticket::where('reply_code' , 0)->count();
        $notanswer = round(($expire / $total)*100);

        return view('clients.ticket_details' , compact('notseen' , 'answer' , 'notanswer'));
    }

    public function notseen()
    {
        $notseens = Ticket::where([
                ['reply_code', '=', 0],
                ['seen', '=', 0]                
            ])->paginate(10);

        return view('clients.tickets.notseen' , compact('notseens'));
    }

    public function answer()
    {
        $answers = Ticket::where([
                ['reply_code', '=', 1],
                ['seen', '=', 1]                
            ])->paginate(10);

        return view('clients.tickets.answer' , compact('answers'));
    }

    public function notanswer()
    {
        $notanswers = Ticket::where([
                ['reply_code', '=', 0],
                ['seen', '=', 1]                
            ])->paginate(10);

        return view('clients.tickets.notanswer' , compact('notanswers'));
    }

    public function ticket_resp($id)
    {
        $tickets = Ticket::where('id' , $id)->first();
        return view('ticket_resp' , compact('tickets'));
    }

    public function ticket_answer(TicketAnswerRequest $request , $id)
    {
        $tickets = Ticket::where('id' , $id)->first();
        $tickets->reply = $request->reply;
        $tickets->seen = 1;
        $tickets->reply_date = Carbon::now();
        $tickets->reply_code = 1;
        if( $tickets->update() )
        {
        session()->flash('message' , 'پاسخ شما با موفقیت ثبت شد. این پاسخ به واحد مربوطه اعلام می گردد .'); 
        return redirect('ticket');
        }
        else
        {
            return redirect()->back();
        }    
    }
   
}
