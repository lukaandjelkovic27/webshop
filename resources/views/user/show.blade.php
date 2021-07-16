@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 card">
                <div class="product-img-content" style="min-width: 100px">
                    <img src="{{asset('/storage/images/' . $product->image_path)}}" class="post-image" style="width: 100%; max-height: 500px" alt="car"/>
                </div>
                <h1>{{$product->title}}</h1>
                <p>{{$product->description}}</p>
            </div>
            @if(auth()->user())
                @if($product->quantity > 0)
                    <div>
                        <form action="{{route('user.add_product', $product->id)}}" method="POST">
                            @csrf
                            <button class="btn btn-primary" type="submit">Add to cart</button>
                            <input type="number" min="1" max="{{$product->quantity}}" name="quantity" required>
                        </form>
                    </div>
                @else
                    <span>Product out of stock</span>
                @endif
            @endif
        </div>
    </div>
@endsection

