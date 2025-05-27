@extends('nav')

@section('content')
<div class="card col-6 mx-auto px-2 py-2">
    {{-- <p class="text-3xl text-danger">Welcome to laravel 12. {{$name.' '.$school}}</p>
    {{ $username }} --}}

    <form action="/register" method="post">
        @csrf
        <h4 class="text-center">Registration Form</h4>

        @if (isset($message))
            <span class="fw-bold fs-4 mb-5 text-{{$status ? 'success' : 'danger'}} mx-auto">{{$message}}</span>
        @endif
        {{-- csrf = cross site request function --}}
        <div class="form-group mb-2">
            <label for="">Full name</label>
            <input type="text" class="form-control" name="full_name">
        </div>
        @if ($errors->get('full_name'))
            <div class="text-danger text-sm">{{$errors->first('full_name')}}</div>   
        @endif

        <div class="form-group mb-2">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        @if ($errors->get('email'))
        <div class="text-danger text-sm">{{$errors->first('email')}}</div>   
        @endif

        <div class="form-group mb-2">
            <label for="">Phone number</label>
            <input type="tel" class="form-control" name="phone_number">
        </div>
        {{-- @if ($errors->get('full_name'))
        <div class="text-danger text-sm">{{$errors->get('full_name')}}</div>   
         @endif --}}

        <div class="form-group mb-2">
            <label for="">Password</label>
            <input type="text" class="form-control" name="password">
        </div>
        @if ($errors->get('password'))
        <div class="text-danger text-sm">{{$errors->first('password')}}</div>   
        @endif

        <div class="form-group mb-2">
        <button type="submit" class="btn btn-md bg-dark text-white">Register</button>
        </div>
    </form>
</div>

@endsection

@section('search-bar')
<form class="d-flex" role="search">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
@endSection