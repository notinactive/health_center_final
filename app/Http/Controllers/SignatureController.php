<?php

namespace App\Http\Controllers;

use App\Signature;
use App\Unit;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\SignatureRequest;

class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signatures = Signature::orderby('id' , 'DESC')->paginate(5);
        return view('signatures.index' , compact('signatures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::orderby('id' , 'DESC')->get();
        $users = User::orderby('id' , 'DESC')->get();
        return view('signatures.create' , compact('units' , 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SignatureRequest $request)
    {       

         $signature = Signature::create($request->all());

         $filename = time().'.'.$request->file('image')->getClientOriginalExtension();
         $imagePath = "images/signatures/";
         
         if($request->file('image')->move($imagePath , $filename)){

            $signature->image = $filename;
         }

         if($signature->save())
         {
            session()->flash('signature' , 'اسکن امضاء با موفقیت ثبت شد');
            return redirect(route('signature.index'));
         }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function show(Signature $signature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function edit(Signature $signature)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Signature $signature)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Signature  $signature
     * @return \Illuminate\Http\Response
     */
    public function destroy(Signature $signature)
    {
       //$signature->delete();
       //return redirect()->back();
    }
}
