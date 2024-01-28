<?php

namespace App\Http\Controllers;

use App\Dtos\Cart\CartDto;
use App\Dtos\Cart\CartItemDto;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Arr;

class CartController extends Controller
{

        public function index()
    {
        dd(Session::get('cart', new CartDto()));
        return view('cart');    
    }


    public function store(Product $product)
    {
        $cart = Session::get('cart', new CartDto());
        $items = $cart->getItems();
        
        if (Arr::exists($items, $product->id)){
            $items[$product->id]->incrementQuantity();
        }
        else{
            $cartItemDto = new CartItemDto();
            $cartItemDto->setId($product->id);
            $cartItemDto->setName($product->name);
            $cartItemDto->setPrice($product->price);
            $cartItemDto->setImagePath($product->image_path);
            $cartItemDto->setQuantity(1);
            $items[$product->id] = $cartItemDto;
        }
        $cart->setItems($items);
        $cart->IncrementTotalQuantity();
        $cart->IncrementTotalSum($product->price);
        Session::put('cart', $cart);
        
        return response()->json([
            'status' => 'success'
        ]);
        }
}
