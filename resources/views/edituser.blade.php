@extends('nav')
@section('content')
<form action="/dashboard/{{ $user->id }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">
    <div class="form-group  mb-2">
        <label for="name">Name:</label>
        <input type="text" name="name" value="{{ $user->name }}">
    </div>
    <div class="form-group mb-2">
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $user->email }}">
    </div>
    <button type="submit">Update User</button>
</form>