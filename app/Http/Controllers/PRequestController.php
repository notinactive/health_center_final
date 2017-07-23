<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Preq;
use Session;

class PRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sabads = Preq::orderby('id' , 'desc')->paginate(10);
        return view ('prequest.index' , ['sabads' => $sabads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('prequest.create');
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
        //
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

   
    public function save_ajax(Request $request)
    {
        $items = new Product($request->all());
         
    }

    public function add (Request $request)
    {       
        $id = $request->get('products_id');
        $count = $request->get('count');
        $descriptin = $request->get('descriptin');

        $request->session()->push('list', [$id , $count , $descriptin]);
      
      $list = Session::get('list');
      
      return Response()->json($list);
    }

    public function add_2 (Request $request)
    {       
       if( session::has('list') ) 
       {
         $list = session::get('list');
         if(array_key_exists( $request->name, $list))
         {
            $value = 0;
         } 
         else
          {
             $list[$request->products_id]=1;
             $list['count']= $request->count;
             $list['descriptin']= $request->descriptin;
          }  
          session::put('list' , $list);
       }
       else
       {
        $list = array();
        $list[$request->products_id] = 1;
         $list['count']= $request->count;
         $list['descriptin']= $request->descriptin;
        session::put('list' , $list);
       }
      
      $list = Session::get('list');
      
      return Response()->json($list);
    }

    public function reject(Request $request)
    {
        Session::forget('list');
        return view('index');
    }
}
