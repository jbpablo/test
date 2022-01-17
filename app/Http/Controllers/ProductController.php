<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return Products::all();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $product = new Products();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->code = $request->code;
        $product->price = $request->price;
        if($product->save())
        {
            new ProductResource($product);
            return response()->json(['message'=>'Product has been added'],201);
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
        //
        $product= Products::findOrFail($id);
        return new ProductResource($product);
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
        $product= Products::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->code = $request->code;
        $product->price = $request->price;
        if($product->save())
        {
            return new ProductResource($product); 
            return response()->json(['message'=>'Product has been updated'],201);
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
        $product= Products::findOrFail($id);
        if($product->delete())
        {
            return new ProductResource($product);
            return response()->json(['message'=>'Product has been deleted'],201);
        }
    }
}
