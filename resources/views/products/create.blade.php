
@extends('layout.app')
@section('main')


    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        Add Product
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/products/store" enctype="multipart/form-data">
                            @csrf <!-- CSRF Token -->

                            <div class="form-group">
                                <label for="code">Code</label>
                                <input type="text" name="code" id="code" class="form-control" placeholder="Enter the code" value="{{ old('code') }}">
                                @if ($errors->has('code'))
                                    <span class="text-danger">
                                        {{ $errors->first('code') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter the name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                        {{ $errors->first('name') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" id="price" step="0.01" class="form-control" placeholder="Enter the price" value="{{ old('price') }}">
                                @if ($errors->has('price'))
                                    <span class="text-danger">
                                        {{ $errors->first('price') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="category">Category</label>
                                <input type="text" name="category" id="category" class="form-control" placeholder="Enter the category" value="{{ old('category') }}">
                                @if ($errors->has('category'))
                                    <span class="text-danger">
                                        {{ $errors->first('category') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter the description">{{ old('description') }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">
                                        {{ $errors->first('description') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @if ($errors->has('image'))
                                    <span class="text-danger">
                                        {{ $errors->first('image') }}
                                    </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-dark">Submit</button>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

