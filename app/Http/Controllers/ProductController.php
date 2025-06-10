<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productsPage(){
        $user = session('user');
        $products = Product::where('user_id', $user->id)->get();
        return view('product', ['products' => $products]);
    }

    public function createProduct(Request $req){
        if ($req->name && $req->description && $req->price && $req->image) {
            $newname = time() . $req->image->getClientOriginalName();
            $move = $req->image->move(public_path('image'), $newname);
            if ($move) {
                $user = session('user');
                $product = new Product;
                $product->name = $req->name;
                $product->description = $req->description;
                $product->price = $req->price;
                $product->image = $newname;
                $product->user_id = $user->id;
                $product->save();
                return redirect('/products');
            } else {
                return view('home');
            }
        } else {
            return redirect('/dashboard')->with('message', 'Please fill all fields')->with('status', false);
        }
    }
        


    // public function editProduct($id)
    // {
    //     $product = Product::find($id);
    //     return view('productedit', ['product' => $product]);
    // }
    
    // public function updateProduct(Request $request, $id)
    // {
    //     $product = Product::find($id);
    //     $product->update($request->all());
    //     return redirect('/products');
    // }


    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $imagePath = public_path('image/' . $product->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        } else {
            echo 'File does not exist';
        }
        $product->delete();
        return redirect('/products');
    }

    public function allProducts()
    {
        $products = Product::with('user')->get();
        return view('all-products', ['products' => $products]);
    }
}
