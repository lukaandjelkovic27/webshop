@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Order List</h1>

            @foreach($orders as $order)
                <span>Order id</span>
            @endforeach

        </div>
    </div>
@endsection
