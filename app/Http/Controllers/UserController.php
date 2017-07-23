<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests;
use App\User;
use App\Unit;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderby('id' , 'DESC')-> paginate(10);         
        return view('user.index' , ['users' => $users]);
    }

    public function store(UserRequest $request)
    {
         $new = new User ( $request->all() );
         $new->password = bcrypt($request->password);
        if( $new -> save() )
        {
            session()->flash('user_create' , 'کاربر جدید با موفقیت ثبت نام شد'); 
            return redirect('user');
        }
        else
        {
            return redirect::back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

     public function create()
    {
        $units = Unit::orderby('id' , 'DESC')->get();

        return view ('user.create' , ['units' => $units]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);
        $units = Unit::orderby('id' , 'DESC')->get();
        return view('user.edit' , ['users' => $users , 'units' => $units]);
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
        $re = User::find($id);

        if( $request -> has('password2') )
        {
            session()->flash('user_edit' , 'تغییرات پروفایل کاربر با موفقیت ثبت شد');
            $re->password = bcrypt($request->password2);
        }

        if($re->update($request->all()))
        {

            return redirect('user');
        }

        else
        {
            return redirect()->back();
        }
    }


    public function search_user(Request $request)
    {
        if($request->ajax())
        {
          $user = User:: where('id',$request->name)->get();
          
          return response()->json($user);
        }
    }

    
}
