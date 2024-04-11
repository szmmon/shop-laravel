@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row">
    @include('helpers.flash-messages')
        <div class="col-10">Order list </div>
        <div class="col-2 float-right">
        </div>
    </div>
    <div class="row">
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">User</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Products</th>
        </tr>
    </thead>
    @foreach($orders as $order)
    <tbody>
        <tr>
        <td>{{$order->id}}</td>
        <td>{{$order->user_id}}</td>
        <td>{{$order->quantity}}</td>
        <td>{{$order->price}}</td>
        <td>
                <ul>
            @foreach($order->products as $product)
                <li>    {{$product->name}} - {{$product->description}}</li>
            @endforeach
                </ul>
        </td>
        </tr>
    @endforeach
    </tbody>
    </table>
    </div>  
    {{$orders->links()}}
    </div>


@endsection

