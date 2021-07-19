@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Order history</h1>
            <div class="col-md-12">
                @foreach($orders as $order)
                <div class="card">
                    Order id {{$order->id}}
                    <span>Products:</span>
                    @foreach($order->cart->products as $product)
                        <ul>
                            <li>Product: {{$product->title}}/quantity: {{$product->pivot->quantity}} </li>
                        </ul>
                    @endforeach
                    @if($order->status === $status[0])
                        <span>Pending</span>
                    @elseif($order->status === $status[1])
                        <span>Cancelled</span>
                    @else
                        <span>Accepted</span>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

