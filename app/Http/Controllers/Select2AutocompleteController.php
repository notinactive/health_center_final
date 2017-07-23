<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class Select2AutocompleteController extends Controller
{
     
    /**

     * Show the application dataAjax.

     *

     * @return \Illuminate\Http\Response

     */

    public function dataAjax(Request $request)

    {

    	$data = [];


        if($request->has('q')){

            $search = $request->q;

            $data = DB::table("products")

            		->select("id","name")

            		->where('name','LIKE',"%$search%")

            		->get();
        }

        return response()->json($data);

    }

     public function dataAjax2(Request $request)

    {

        $data = [];


        if($request->has('q')){

            $search = $request->q;

            $data = DB::table("services")

                    ->select("id","name")

                    ->where('name','LIKE',"%$search%")

                    ->get();
        }

        return response()->json($data);

    }

     public function dataAjax3(Request $request)

    {

        $data = [];

        if($request->has('q')){

            $search = $request->q;

            $data = DB::table("users")

                    ->select("id","name")

                    ->where('name','LIKE',"%$search%")

                    ->get();
        }

        return response()->json($data);

    }

     public function dataAjax4(Request $request)

    {

        $data = [];

        if($request->has('q')){

            $search = $request->q;

            $data = DB::table("units")

                    ->select("id","unitname")

                    ->where('unitname','LIKE',"%$search%")

                    ->get();
        }

        return response()->json($data);

    }


        public function client_dataAjax(Request $request)

            {

                $data = [];

                if($request->has('q')){

                    $search = $request->q;

                    $data = DB::table("products")

                            ->select("id","name")

                            ->where('name','LIKE',"%$search%")

                            ->get();
                }

                return response()->json($data);

            }

}
