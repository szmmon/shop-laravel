<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Exception;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        return view('products.index', [
            'products' => Product::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        return view('products.create', [
            'categories' => ProductCategory::all()
        ]);
    }
    
      public function test1():View
    {
        return view('test1');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product($request->validated());
                if ($request->hasFile(key:'image')){
        $product->image_path = $request->file(key:'image')->store(path:'products');
                }
        $product->save();
        return redirect(route('products.index'));
        }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
            'categories' => ProductCategory::all()

        ]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
            'categories' => ProductCategory::all()
        ]);        
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->fill($request->validated());
        if ($request->hasFile(key:'image')){
                $product->image_path = $request->file(key:'image')->store(path:'products');
        }
        $product->save();
        return redirect(route('products.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
        $product->delete();
        return response()->json(
            ['status'=> 'success']
        );
            
        } catch (\Exception $e) {
        return response()->json(
            ['status'=> 'error',
            'message'=>'Serverside error occured']
        )->setStatusCode(500);
            
        }
    }
}
