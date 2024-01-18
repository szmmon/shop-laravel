@extends('layouts.app')

@section('content')
  <div class="row">
      @include('helpers.flash-messages')
  </div>
  <div class="container">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Email</th>
        <th scope="col">First name</th>
        <th scope="col">Last name</th>
        <th scope="col">Phone number</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    @foreach($users as $user)
    <tbody>
      <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->email}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->surname}}</td>
        <td>{{$user->phone_number}}</td>
        <td><button class="btn btn-danger sm test-btn" data-id="{{$user->id}}"><i class="fa-solid fa-trash"></i></button></td>

      </tr>
      @endforeach
    </tbody>
  </table>
  {{$users->links()}}
  </div>

      @section('javascript')
      const deleteUrl = "{{url('users')}}/";
      @endsection

      @section('js-files')
          <!-- dropdown wont work without this linking  -->
          <script src="{{ asset('js/app.js') }}" ></script> 
          <script src={{ asset('js/userHandling.js') }}></script>
      @endsection

@endsection

