<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sreq;
use App\Requestservice;

class SRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Sreq::orderby('id' , 'desc')->paginate(10);        
        return view('srequest.index' , compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('srequest.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requests = Sreq::find($id);
        $services = Requestservice::where('sreqs_id' , $id)->get();
        return view('srequest.show' , compact('services' , 'requests'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

     public function reject_srequest()
    {
        $srequests = Sreq::where('reject' , 1)->paginate(10);
        return view('clients.service_req.reject_req' , compact('srequests'));
    }

    public function reject_edit($id)
    {
        return view('clients.service_req.reject_edit');
    }

    public function rej_destroy($id)
    {
        $preqs = Sreq::where('id' , $id)->delete();

        return redirect(route('rej_sreq'));
    }
}
