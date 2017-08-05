<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sreq;
use App\Requestservice;
use App\Service;

class ClientservController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sabads = Sreq::orderby('id' , 'DESC')->paginate(8);
        return view ('clients.service_req.index' , ['sabads' => $sabads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        return view ('clients.service_req.create' , compact('services'));
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
        return view('clients.service_req.show' , compact('services' , 'requests'));
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

    public function confirm(Request $request)
    {
        $services = Sreq::where('id' , $request->sabad_id)->first();
        $services->confirm = 1;       
        if($services->save())
        {
            return 1;
        }
    }
}
