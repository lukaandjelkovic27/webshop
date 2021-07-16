@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Products list</h1>
        <label for="categories">Select category</label>
        <form id="form-action" action="" method="GET">
            <select id="categories" onchange="setRoute(this.value)">
                @foreach($categories as $category)
                    @if(isset($active_ctg))
                    <option @if($active_ctg /*&& $active_ctg*/ === $category->id)  selected @endif value="{{$category->id}}"> {{$category->name}} </option>
                    @else
                        <option  value="{{$category->id}}"> {{$category->name}} </option>
                        @endif
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary btn-sm">Go</button>
        </form>
        <script>
            function setRoute(id) {
                document.getElementById('form-action').setAttribute('action', '/admin/products/' + id);
            }
        </script>
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 card">
                    <div class="product">
                        <div class="product-img-content" style="min-width: 100px">
                            <a href="{{route('admin.show_product', $product->id)}}">
                                <img src="{{asset('/storage/images/' . $product->image_path)}}" class="post-image" style="width: 100%"/>
                            </a>
                        </div>
                        <div class="content">
                            <div class="card-title">
                                <h3>{{$product->title}}</h3>
                                <span>{{date('jS M Y', strtotime($product->updated_at)) }}</span>
                            </div>
                            <div>
                                <p>Price: {{$product->price}}</p>
                            </div>
                            <div>
                                @foreach($product->categories as $category)
                                    <span>#{{$category->name}}</span>
                                @endforeach
                            </div>
                            <div>
                                <a href="{{route('admin.edit_product', $product->id)}}"><button class="btn btn-warning btn-sm">Edit Product</button></a>
                                <a href="{{route('admin.edit_productCategory', $product->id)}}"><button class="btn btn-warning btn-sm">Edit Product Categories</button></a>
                            </div>
                            <div>
                                <form action="{{route('admin.delete_product', $product->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
