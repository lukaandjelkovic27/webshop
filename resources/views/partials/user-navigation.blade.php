    <a class="navbar-brand" href="{{url('user')}}">Webshop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <a class="nav-link" href="{{route('user.products')}}" >
                Products List
            </a>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <form id="form-action" action="" method="GET">
                        <select id="categories" onchange="setRoute(this.value)">
                            @foreach(\App\Models\Category::all() as $category)
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
                            document.getElementById('form-action').setAttribute('action', 'products/' + id);
                        }
                    </script>
                </div>
            </li>
            <li>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <a class="nav-link" href="{{route('user.index_cart')}}" >
                Cart
            </a>
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>

