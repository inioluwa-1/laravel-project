@extends('nav')
@section('content')
<div>Dashboard</div>
@if (isset($user))
    <div class="col-6 mx-auto shadow">
        <h1 class="text-center text-primary">Students</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">profile picture</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td style="width: 50px; height: 50px; object-fit: cover;">{{$user->profile_picture}}</td>
                        <td>{{$user->name}} </td>
                        <td>{{$user->email}} </td>
                        <td>
                            <form action="deleteuser" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <input type="submit" name="DeleteAccount" value="Delete Account" class="btn btn-danger">
                            </form>
                            <a href="/dashboard/{{ $user->id }}"> <i class="fa-solid fa-pen-to-square"></i>Update</a> <br>
                            <a href="/notes">Add Notes</a> <br>
                            <a href="/checklist/{{ $user->id }}">check list</a> <br>
                            <a href="/picture/{{ $user->id }}"><i class="fa-solid fa-user">Upload profile picture</a>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
@endif
@endsection