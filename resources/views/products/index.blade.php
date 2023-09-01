@extends('layout.app')
@section('main')

    <div class="container">
        <div class="text-right">
            <a href="products/create" class="btn btn-dark mt-2">New Product</a>
        </div>
        <h1>Products</h1>
    </div>
    <div class="container">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('products/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">Price: ${{ $product->price }}</p>
                        <div class="d-flex justify-content-between">
                        <a href="products/{{$product->id}}/edit" class="btn btn-dark">Edit</a>
                        <form method="POST" action="products/{{$product->id}}/delete">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
