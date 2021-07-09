<ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.home')}}">Admin Panel<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.products')}}">All Products<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.new-product')}}">New Product<span class="sr-only">(current)</span></a>
    </li>
</ul>
<ul class="navbar-nav ml-auto">
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
