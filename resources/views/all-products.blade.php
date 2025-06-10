@extends('nav')
@section('content')
<h1>All Products</h1>

<ul>
    @foreach($products as $product)
        <li>
            <h2>{{ $product->name }}</h2>
            <p>Price: ${{ $product->price }}</p>
            <p>Description: {{ $product->description }}</p>
            <img src="{{ asset('image/' . $product->image) }}" alt="{{ $product->name }}" style="width: 200px; height: 200px; object-fit: cover;">
            <p>Uploaded by: {{ $product->user->name }}</p>
            <hr>

        </li>
    @endforeach
</ul>
@endsection