<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

use Exception;
use Illuminate\Support\Facades\Redirect;

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
        return redirect(route('products.index'))->with('status', 'Product stored');
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
        
        $oldImagePath = $product->image_path;
        $product->fill($request->validated());
        if ($request->hasFile(key:'image')){

                $product->image_path = $request->file(key:'image')->store(path:'products');
        }
        $product->save();
        return redirect(route('products.index'))->with('status', 'Product updated');;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
        $product->delete();
        Session::flash('status', 'Product deleted');
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
    /**
     * Download the specified resource in storage.
     */
    public function downloadImage(Product $product)
    {        
                if (Storage::exists($product->image_path)){
                    return Storage::download($product->image_path);
                }
        return Redirect::back();

    }
}
