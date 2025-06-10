@extends('nav')
@section('content')
<div class="container">
    <h1 class="text-center text-primary">Edit Product</h1>
    <form action="/products/update/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" value="{{ $product->name }}" placeholder="Product Name" class="border-b-2 p-2 w-100 border-gray-300 focus:outline-0">
        <input type="text" name="price" value="{{ $product->price }}" placeholder="Product Price" class="border-b-2 p-2 w-100 border-gray-300 focus:outline-0">
        <input type="text" name="description" value="{{ $product->description }}" placeholder="Product Description" class="border-b-2 p-2 w-100 border-gray-300 focus:outline-0">
        <input type="file" name="image"> <br/>
        <button class="duration-300 border hover:cursor-pointer text-[#6F7FFE] font-bold py-2 px-3 bg-[#C8CCFC] rounded text-sm hover:bg-white hover:text-black">Update Product</button>
    </form>
@endsection