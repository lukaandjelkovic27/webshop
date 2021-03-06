@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{route('admin.store-product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{method_field("POST")}}
                        <h1>Categories</h1>
                        <div class="form-group">
                            <label for="inputName">Choose product categories:</label>
                            <br>
                            @if(count($categories) > 0)
                                    @foreach($categories as $carCategory)
                                    <label for="car_name">{{$carCategory->name}}</label>
                                    <input type="checkbox" name="categories[]" id="inputName" value="{{$carCategory->id}}">
                                    @endforeach
                            @endif
                        </div>
                        <h1>Add Product</h1>
                        <div class="form-group">
                            <label for="inputTitle">Name</label>
                            <input type="text" class="form-control" id="inputTitle"  name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">About Product</label>
                            <textarea name="description" cols="65" rows="10" id="inputDescription"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Price</label>
                            <input type="number" class="form-control" name="price" id="inputPrice"  required>
                        </div>
                        <div class="form-group">
                            <label for="inputCurrency">Currency</label>
                            <input type="text" class="form-control" name="currency" id="inputCurrency" required >
                        </div>
                        <div class="form-group">
                            <label for="inputQuantity">Quantity</label>
                            <input type="number" class="form-control" name="quantity" id="inputQuantity" required >
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
