@extends('layouts.app')

@section('content')
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
      <td><button class="btn btn-danger sm test-btn" data-id="{{$user->id}}">x</button></td>

    </tr>
    @endforeach
  </tbody>
</table>
{{$users->links()}}
</div>
@endsection

