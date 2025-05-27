@extends('nav')
@section('content')

    <div class="col-6 mx-auto shadow p-3">
    <h3 class="text-center text-primary">Forgot Password</h3>
    <form action="/forgot" method="post">
        @csrf
        <input type="email" class="form-control my-2" placeholder="Enter valid email address" name="email">
        <input type="submit" name="submit" value="verify Email" class="btn btn-outline-primary">
    </form>
    </div> 
@endsection