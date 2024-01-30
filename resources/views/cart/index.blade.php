@extends('layouts.app')

@section('css-files')
    <link href="{{asset('css/cart.css')}}" rel="stylesheet">
    <!-- zeby nie ladowalo css dla kazdej strony tylko dla tego danego endpointa -->
@section('content')

    <div class="container">
    <div class="row">
    @include('helpers.flash-messages')
        
    </div>
    <div class="row">
        <div class="cart_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Shopping Cart<small> ({{$cart->getItems()->count()}})</small></div>
                        <div class="cart_items">
                            <ul class="cart_list">
                            @foreach($cart->getItems() as $item)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image">
                                        @if (!is_null($item->getImagePath()))
                                            <img src="{{asset('storage/' . $item->getImagePath() )}}" class="img-fluid mx-auto d-block" alt="Product image">
                                        @else
                                            <img src="https://via.placeholder.com/240x240/5fa9f8/efefef" class="img-fluid mx-auto d-block" alt="Product image">
                                        @endif
                                        </div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{$item->getName()}}</div>
                                            </div>
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Quantity</div>
                                                <div class="cart_item_text">{{$item->getQuantity()}}</div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">PLN {{$item->getPrice()}}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">PLN {{$item->getSum()}}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_text">
                                                    <button class="btn btn-danger sm test-btn" data-id="{{$item->getId()}}"><i class="fa-solid fa-trash"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Order Total:</div>
                                <div class="order_total_amount">{{$cart->getSum()}}</div>
                            </div>
                        </div>
                        
                        <div class="cart_buttons"> <a href="/"><button type="button" class="button cart_button_clear">Continue Shopping</button> </a>
                        <button type="button" class="button cart_button_checkout">Continue to payment</button> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    
@section('javascript')

      const WELCOME_DATA = {
           storagePath: '{{asset('storage')}}',
           defaultImage: '{{'defaultImage'}}',
           addToCart: ' {{ url('cart') }}/'
      }
    
      @endsection
      @section('js-files')
          <script src="{{ asset('js/app.js') }}" ></script>
          <script src={{ asset('js/userHandling.js') }}></script>
      @endsection

@endsection
@endsection

