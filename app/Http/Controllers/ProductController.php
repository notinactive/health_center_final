<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Requestproduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderby('id' , 'DESC') -> paginate(10);
        return view('product.index' , ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
         $product = new Product($request->all());

        if($product -> save())
        {
            return redirect('/product');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {         
        $products = Product::find($id);        
        return view('product.edit' , ['products' => $products]);
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
        $re = Product::find($id);

        if($re->update($request->all()))
        {
            return redirect('product');
        }

        else
        {
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
          $pro = Product:: where('id',$request->name)->get();
          
          return response()->json($pro);
        }        

    }

    public function destroy($id)
    {     
        $product = Requestproduct::where('products_id' , $id)->get();

        if( empty($product) )
        {
        $pro = Product::where('id' , $id)->delete();        
        return redirect('product');        
        }
        else
        {
        return redirect('product');
        }
    }
   
}
