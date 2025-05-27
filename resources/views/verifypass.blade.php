@extends('nav')
@section('content')

    <div class="col-6 mx-auto shadow p-3">
        @if (isset($id))
            
       
    <h3 class="text-center text-primary">Create new Password</h3>
    <form action="/forgotpassword" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$id}}">
        <input type="text" class="form-control my-2" placeholder="Enter password" name="passwordone">
        <input type="text" class="form-control my-2" placeholder="confirm password" name="passwordtwo">
        <input type="submit" name="submit" value="Confirm " class="btn btn-outline-primary">
    </form>
     @endif
     @if (session('success'))
         <p class="text-danger text-center">{{session('success')}}</p>
     @endif
    </div> 
@endsection