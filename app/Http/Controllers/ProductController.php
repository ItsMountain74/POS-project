<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name'=>'required|min:2',
            'qnt'=>'required',
            'price'=>'required',
        ]);
        try {
            Product::create([
                'name'=>$validator['name'],
                'qnt'=>$validator['qnt'],
                'price'=>$validator['price'],
            ]);
            return redirect()->route('products.index')->with('msg' , 'Product Added Successfully');
        }
        catch (Exception $e){
            return $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return response('done');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $product->qnt+=$request->newQnt;
        $product->save();
        return redirect()->route('products.index')->with('msg','Quantity added successfully to the product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('msg','Product Deleted successfully');
    }
}
