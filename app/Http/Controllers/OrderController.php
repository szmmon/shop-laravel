<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\ValueObjects\Cart;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orders.index',
        ['orders' => Order::where('user_id', Auth::id())->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $cart = Session::get('cart', new Cart());
        if($cart->hasItems()){
        $order = new Order();
        $order->quantity = $cart->getQuantity();
        $order->price = $cart->getSum();
        $order->user_id = Auth::id();
        $order->save();

        $productIds = $cart->getItems()->map(function($item){
            return ['product_id' => $item->getId()];
        });
        $order->products()->attach($productIds);

        Session::put('cart', new Cart());

        return redirect(route('orders.index'))->with('status', 'order recieved');
        }
        else {
            return back();
        }
        
    }   

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
