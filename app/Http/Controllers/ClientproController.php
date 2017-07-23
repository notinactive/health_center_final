<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preq;
use App\Requestproduct;
use App\Product;

class ClientproController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sabads = Preq::orderby('id' , 'DESC')->paginate(8);
        return view ('clients.product_req.index' , ['sabads' => $sabads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view ('clients.product_req.create' , compact('products'));
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
        $requests = Preq::find($id);
        $products = Requestproduct::where('preqs_id' , $id)->get();
        return view('clients.product_req.show' , compact('products' , 'requests'));
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
        $prequest = Preq::find($id);
        $prequest->cancel = 1;

        if($prequest->update($request->all()))

        {
            return redirect('client/process_serv');
        }

        else
        {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
