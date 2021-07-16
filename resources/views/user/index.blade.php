@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 card">
                    <div class="product">
                        <div class="product-img-content" style="min-width: 100px">
                            <a href="{{route('user.show_product', $product->id)}}">
                                <img src="{{asset('/storage/images/' . $product->image_path)}}" class="post-image" style="width: 100%"/>
                            </a>
                        </div>
                        <div class="content">
                            <div class="card-title">
                                <h3>{{$product->title}}</h3>
                                <span>{{date('jS M Y', strtotime($product->updated_at)) }}</span>
                            </div>
                            <div>
                                <p>Price: {{$product->price}} {{$product->currency}}</p>
                            </div>
                            <div>
                                @foreach($product->categories as $category)
                                    <span>#{{$category->name}}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
@endsection
