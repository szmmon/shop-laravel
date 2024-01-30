<?php

namespace App\Http\Controllers;

use App\ValueObjects\Cart;
use App\ValueObjects\CartItem;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Arr;

class CartController extends Controller
{

        public function index()
    {
        return view('cart.index', [
            'cart' => Session::get('cart', new Cart())
        ]);
    }
     public function test()
    {
        dd(Session::get('cart', new Cart()));
    }   


    public function store(Product $product)
    {
        $cart = Session::get('cart', new Cart());
        
        Session::put('cart', $cart->addItem($product));
        
        return response()->json([
            'status' => 'success'
        ]);
        }

        public function destroy(Product $product)
    {
        // try {
        $cart = Session::get('cart', new Cart());
        Session::put('cart', $cart->removeItem($product));
        Session::flash('status', 'Product deleted');
        return response()->json(
            ['status'=> 'success']
        );
            
        // } catch (\Exception $e) {
        // return response()->json(
        //     ['status'=> 'error',
        //     'message'=>'Serverside error occured']
        // )->setStatusCode(500);
            
        // }
    }
}
