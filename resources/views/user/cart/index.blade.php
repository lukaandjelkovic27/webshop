@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cart</h1>
        <div class="row">
            <div class="col-md-12">
                @if(count($products) > 0)
                    List of selected products
                    @foreach($products as $product)
                        <div class="card" style="max-height: 200px">
                            <div class="product-img-content" >
                                <img src="{{asset('/storage/images/' . $product->image_path)}}" class="post-image" style="max-width: 100px; max-height: 100px"/>
                            </div>
                            <div>
                                <h5>{{$product->title}}</h5>
                                <span>{{$product->price}} {{$product->currency}}</span>
                            </div>
                            <form action="{{route('user.delete_product', $product->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit">Delete from cart</button>
                            </form>
                        </div>
                    @endforeach
                @else
                    Your cart is empty
                @endif
                <form action="{{route('user.send_order', $cart->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Order products</button>
                </form>
            </div>
        </div>
    </div>
@endsection
