@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Edit Product Categories</h1>
                <div>
                    @if(count($productCategories) > 0)
                        <label for="inputName">Selected product categories:</label>
                        <ul>
                            @foreach($productCategories as $productCategory)
                                <li>{{$productCategory->name}}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <h6>Edit Product Categories</h6>
                <form action="{{route('admin.update_productCategory', $product->id)}}" method="POST">
                    @csrf
                    @method('put')
                    @if(count($categories) > 0)
                            @foreach($categories as $category)
                                {{$category->name}}
                                <input type="checkbox" name="categories[]" id="inputName" value="{{$category->id}}">
                            @endforeach
                    @endif
                    <br>
                    <button class="btn btn-primary btn-sm">Edit</button>
                </form>
                <br>
                <h6>Remove all categories from product</h6>
                <form action="{{route('admin.delete_productCategory', $product->id)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm" type="submit">Remove</button>
                </form>
            </div>
        </div>
    </div>
@endsection
