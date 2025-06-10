@extends('nav')
@section('content')
<div class="container">
    <h1 class="text-center text-primary">Create New Product</h1>
    <form action="/products/create" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Product Name" class="border-b-2 p-2 w-100 border-gray-300 focus:outline-0">
        <input type="text" name="price" placeholder="Product Price" class="border-b-2 p-2 w-100 border-gray-300 focus:outline-0">
        <input type="text" name="description" placeholder="Product Description" class="border-b-2 p-2 w-100 border-gray-300 focus:outline-0">
        <input type="file" name="image"> <br/>
        <input type="hidden" name="user_id" value={{ session('user')->id }}> <br>
        <button class="duration-300 border hover:cursor-pointer text-[#6F7FFE] font-bold py-2 px-3 bg-[#C8CCFC] rounded text-sm hover:bg-white hover:text-black">Add Product</button>
    </form>
</div>






<div class="container mt-5">
    <h1 class="text-center text-primary">Products</h1>
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    
                    <img src="{{ asset('image/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">Product name: {{ $product->name }}</h5>
                        <p class="card-text"> <b>Description:</b> {{ $product->description }}</p>
                        <p class="card-text"><b>Price:</b> {{ $product->price }}</p>
                        {{-- <a href="/products/edit/{{ $product->id }}" class="btn btn-primary">Edit</a> --}}
                        <a href="/products/delete/{{ $product->id }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection