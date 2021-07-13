@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 card">
                <div class="product-img-content" style="min-width: 100px">
                    <img src="{{asset('/storage/images/' . $product->image_path)}}" class="post-image" style="width: 100%" alt="car"/>
                </div>
                <h1>{{$product->title}}</h1>
            </div>
        </div>
    </div>
@endsection
