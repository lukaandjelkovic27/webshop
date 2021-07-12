@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Products list</h1>
        <label for="categories">Select category</label>
        <form id="form-action" action="" method="GET">
            <select id="categories" onchange="setRoute(this.value)">
                @foreach($categories as $category)
                    <option @if($active_ctg && $active_ctg === $category->id)  selected @endif value="{{$category->id}}"> {{$category->name}} </option>
                @endforeach
            </select>
            <button class="btn btn-primary btn-sm" type="submit">Go</button>
        </form>
        <script>
            function setRoute(id) {
                document.getElementById('form-action').setAttribute('action', '/admin/products/' + id);
            }
        </script>
        <div class="row justify-content-center">
            {{--<div class="col-md-8">--}}
            @foreach($products as $product)
                <div class="col-md-4 card">
                    <div class="product">
                        <div class="product-img-content" style="min-width: 100px">
                            <img src="{{asset('/storage/images/' . $product->image_path)}}" class="post-image"
                                 style="width: 100%"/>
                        </div>
                        <div class="content">
                            <div class="card-title">
                                <h3>{{$product->title}}</h3>
                                <time>{{date('jS M Y', strtotime($product->updated_at)) }}</time>
                            </div>
                            <div>
                                {{$product->description}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{--   </div>--}}
        </div>
    </div>
@endsection
