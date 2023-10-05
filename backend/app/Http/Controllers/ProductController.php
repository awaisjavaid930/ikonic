<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {   
        $products = Product::get();
        return response()->json(['status' => 200 , 'data' => ProductResource::collection($products) , 'message' => 'data retrived!']);
    }
    
    public function store(StoreProductRequest $request)
    {
        Product::create($request->validated());
        return response()->json(['status' => 200 , 'message' => 'data saved!']);
        
    }
    
    
    public function show($id)
    {
        $product = Product::whereId($id)->first();
        return response()->json(['status' => 200 ,'data' => ProductResource::make($product) , 'message' => 'data saved!']);
    }
    
    
     public function update(StoreProductRequest $request ,$id)
    {
        $product = Product::whereId($id)->first();
        $product->update($request->validated());
        return response()->json(['status' => 200 , 'message' => 'data updated!']);
    }
    
}
