@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit user {{$user->id}}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="address[city]" value="@if($user->hasAddress()){{$user->address->city}}@endif"  autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-end">Zip code</label>

                            <div class="col-md-6">
                                <input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="address[zip_code]" value="@if($user->hasAddress()){{$user->address->zip_code}}@endif"  autocomplete="zip_code" autofocus>

                                @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="street" class="col-md-4 col-form-label text-md-end">Street</label>

                            <div class="col-md-6">
                                <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="address[street]" value="@if($user->hasAddress()){{$user->address->street}}@endif"  autocomplete="street" autofocus>

                                @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="street_num" class="col-md-4 col-form-label text-md-end">Street number</label>

                            <div class="col-md-6">
                                <input id="street_num" type="text" class="form-control @error('street_num') is-invalid @enderror" name="address[street_num]" value="@if($user->hasAddress()){{$user->address->street_num}}@endif"  autocomplete="street_num" autofocus>

                                @error('street_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="home_num" class="col-md-4 col-form-label text-md-end">Home Number</label>

                            <div class="col-md-6">
                                <input id="home_num" type="text" class="form-control @error('home_num') is-invalid @enderror" name="address[home_num]" value="@if($user->hasAddress()){{$user->address->home_num}}@endif"  autocomplete="home_num" autofocus>

                                @error('home_num')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0 float-right">
                            <div class="col offset-md-10">
                                <button type="submit" class="btn btn-primary">
                                    Save user
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
