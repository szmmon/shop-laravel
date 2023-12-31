@extends('layouts.app')

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-10">Products list </div>
        <div class="col-2 float-right">
            <a href="{{route('products.create')}}" class='float-right'>
                <button class="btn btn-primary">Add product</button>
            </a>
        </div>
    </div>
    <div class="row">
    <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Amount</th>
        <th scope="col">Price</th>
        <!-- <th scope="col">Actions</th> -->
        </tr>
    </thead>
    @foreach($products as $product)
    <tbody>
        <tr>
        <th scope="row">{{$product->id}}</th>
        <td>{{$product->name}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->amount}}</td>
        <td>{{$product->price}}</td>
        <td><a href="{{route('products.edit', $product->id)}}"><button class="btn btn-secondary sm">E</button></a>
        <a href="{{route('products.show', $product->id)}}"><button class="btn btn-success sm">S</button></a>
        <button class="btn btn-danger sm test-btn" data-id="{{$product->id}}">x</button></td>

        </tr>
        @endforeach
    </tbody>
    </table>
    </div>
    {{$products->links()}}
    </div>

@endsection

