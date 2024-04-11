@extends('layouts.app')

@section('content')

    <div class="container">
    <div class="row">
    @include('helpers.flash-messages')
        <div class="col-10">Products list </div>
        <div class="col-2 float-right">
            <a href="{{route('products.create')}}" class='float-right'>
                <button class="btn btn-primary"><i class="fa-solid fa-plus"></i></button>
            </a>
            <!-- <a href="{{route('products.test1')}}" class='float-right'>
                <button class="btn btn-primary">Add test</button>
            </a> -->
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
        <th scope="col">Category</th>
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
        <td>
        @if($product->hasCategory()){{$product->category->name}}@endif</td>
        <td><a href="{{route('products.edit', $product->id)}}"><button class="btn btn-secondary sm"><i class="fa-solid fa-pen-to-square"></i></button></a>
        <a href="{{route('products.show', $product->id)}}"><button class="btn btn-success sm"><i class="fa-solid fa-magnifying-glass"></i></button></a>
        <button class="btn btn-danger sm test-btn" data-id="{{$product->id}}"><i class="fa-solid fa-trash"></i></button></td>
        </tr>
        @endforeach
    </tbody>
    </table>
    </div>
    {{$products->links()}}
    </div>
    
      @section('javascript')
      <!-- Swal.fire('hello world'); -->
      const deleteUrl = "{{url('products')}}/";
      @endsection

      @section('js-files')
          <script src={{ asset('js/userHandling.js') }}></script>
          <script src="{{ asset('js/app.js') }}" ></script>
      @endsection


@endsection

