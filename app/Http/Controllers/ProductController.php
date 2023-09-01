<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('products.index',['products'=>$products]);
    }

    public function create(){
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:products,code',
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'category' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example: Allow only image files up to 2MB
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('products'), $imageName);

        $product = new Product;
        $product->code = $request->code;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;
        $product->image = $imageName;

        $product->save();

        return back()->withSuccess('Product Created !!!!');
    }

    public function edit($id){
        $product = Product::where('id',$id)->first();
        return view('products.edit',['product'=>$product]);
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'code' => 'required|unique:products,code',
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'category' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Example: Allow only image files up to 2MB
        ]);

        $product = Product::where('id',$id)->first();

        if(isset($request->image)){
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }

        $product->code = $request->code;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->description = $request->description;


        $product->save();

        return back()->withSuccess('Product Product updated !!!!');
    }
     public function destroy($id){
        $product = Product::where('id',$id)->first();
        $product->delete();
        return back()->withSuccess('Product Deleted !!!!!!!');
     }

}
