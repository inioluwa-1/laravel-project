@extends('nav')

@section('text')
<div class="card col-6 mx-auto p-4">
    <form action="/login" method="post">
        @csrf
        <h4 class="text-center">Login Form</h4>

        @if (isset($message))
            <span class="fw-bold fs-4 mb-5 text-success text-center">{{$message}}</span>
        @endif 
    
        <div class="form-group mb-2">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        @if ($errors->get('email'))
        <div class="text-danger text-sm">{{$errors->first('email')}}</div>   

        @endif
        <div class="form-group mb-2">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        @if ($errors->get('password'))
        <div class="text-danger text-sm">{{$errors->first('password')}}</div>

        @endif
        <div class="form-group mb-2">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>
    </form>
    <a href="/forgot">Forgot Password? <br> click here you MFA</a>
</div>