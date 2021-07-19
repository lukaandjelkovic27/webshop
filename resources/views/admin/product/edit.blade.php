@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{route('admin.update_product', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h1>Edit Product</h1>
                    <div class="form-group">
                        <label for="inputTitle">Name</label>
                        <input type="text" class="form-control" id="inputTitle"  name="title" value="{{$product->title}}" required>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">About Product</label>
                        <textarea name="description" cols="65" rows="10" id="inputDescription">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputPrice">Price</label>
                        <input type="number" class="form-control" name="price" id="inputPrice"  value="{{$product->price}}" required >
                    </div>
                    <div class="form-group">
                        <label for="inputCurrency">Currency</label>
                        <input type="text" class="form-control" name="currency" id="inputCurrency" value="{{$product->currency}}" required >
                    </div>
                    <div class="form-group">
                        <label for="inputQuantity">Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="inputQuantity" value="{{$product->quantity}}" required >
                    </div>
                    <div class="form-group">
                        <label for="inputImage">Product Image</label>
                        <input type="file" class="form-control" name="image" id="inputImage">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection

