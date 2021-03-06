<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UnitRequest;
use App\Unit;
use App\Province;
use App\City;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::orderby('id' , 'DESC')-> paginate(7);         
        return view('unit.index' , ['units' => $units]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // auth()->loginUsingId(1);
        //return auth()->user();
        $provinces = Province::orderby('id' , 'ASC')->get(); 
        $cities = City::orderby('id' , 'ASC')->get();

        return view('unit.create' , compact('provinces' , 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitRequest $request)
    {
        //auth()->loginUsingId(1);
        // $unit = new Unit($request->all());

       // if($unit -> save())
        //{
        //    return redirect('/unit');
       // }

        return redirect('/');
               
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
        $units = Unit::find($id);        
        return view('unit.edit' , ['units' => $units]);
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
         $re = Unit::find($id);

        if($re->update($request->all()))
        {
            return redirect('unit');
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
        //
    }

     public function search(Request $request)
    {
        if($request->ajax())
        {
          $pro = Unit:: where('id',$request->name)->get();
          
          return response()->json($pro);
        }
    }

    public function city(Request $request)
    {
        $city = City::where('province_id' , $request->id)->get();
        return Response()->json($city);
    }
}
