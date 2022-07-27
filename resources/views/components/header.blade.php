<header class="navbar navbar-expand-lg">
    <nav class="container">
        <a class="navbar-brand col-auto fw-800" href="{{ route('index') }}">
                <!--
                <img src="{{ asset('img/logo.png') }}" width="50" height="50" alt="logo">
                <img class="logo" src="https://districtgurus.com/public/uploads/all/SC008HOLHmfOeB8E3SxNDONHI7nad1YJcmSl0ds9.png" data-src="https://districtgurus.com/public/uploads/all/SC008HOLHmfOeB8E3SxNDONHI7nad1YJcmSl0ds9.png" alt="District Gurus">-->
                #JEWELRYCG
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- left navbar-->
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown menu-area">
                    <a class="nav-link" href="{{ route('index') }}">Home</a>
                </li>
                <li class="nav-item dropdown menu-area">
                    <a class="nav-link active" href="{{ route('shop_index') }}">3D Models</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" aria-current="page" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">Learn</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('blog') }}">Blog</a></li>
                        <li><a class="dropdown-item" href="{{ route('categoryAll') }}">Categories</a></li>
                        <li><a class="dropdown-item" href="{{ route('tagAll') }}">Tags</a></li>
                        <li><a class="dropdown-item" href="#">Comments</a></li>
                    </ul>
                </li>
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" aria-current="page" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" href="#">{{ Auth::user()->first_name }}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                        <li><a class="dropdown-item" href="{{route('user.index', auth()->user()->id)}}">My Info</a></li>
                        <li><a class="dropdown-item" href="{{route('orders.index')}}">{{ auth()->user()->is_admin ? 'All Orders' : 'My Orders' }}</a></li>
                        <li><a class="dropdown-item" href="{{route('cart.wishlist')}}">My Wishlist</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </li>
                @endauth
            </ul>
            <!-- end left navbar-->

            <div class="search-form ml-auto mr-auto">
                <form method="get" action="{{route('products.search')}}">
                    <div class="row">
                        <div class="col-12 search-col">
                            <div class="w-100 h-100">
                                <input name="q" type="search" placeholder="Search" aria-label="Search" class="search-control">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- right navbar-->
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown menu-area">
                    <a href="{{route('cart.index')}}" class="nav-link">
                        <i class="bi bi-cart2"></i>
                        <?php
                            if(Cart::instance('default')->content()->count() == 0
                                && auth()->check()
                            )
                            {
                                Cart::merge(auth()->id());
                            }
                        ?>
                        @if ($cart_items = Cart::content()->count())
                            <span class="rounded-pill pill badge bg-primary text-light">
                                {{$cart_items}}
                            </span>
                        @endif
                    </a>
                </li>

                @auth

                @else
                <li class="nav-item ml-1">
                    <a class="nav-link auth-btn" href="{{ route('login') }}">Log In</a>  
                </li>
                <li class="nav-item ml-1">
                    <a class="nav-link auth-btn auth-primary" href="{{ route('register') }}">Sign Up</a>  
                </li>
                @endauth
            </ul>
            <!--end right nav-->

        </div>
    </nav>
</header>
<!--
<div class="global-search-wrap py-2 bg-white border-bottom">
    <div class="container">
        <div class="global-search-form">
            <form method="get" action="{{route('products.search')}}">
                <div class="row">
                    <div class="col-8 search-col">
                        <div class="w-100 h-100">
                            <i class="bi bi-search p-3"></i>
                            <input name="q" type="search" placeholder="Search" aria-label="Search" class="search-control">
                        </div>
                    </div>
                    <div class="col-4">
                        <select name="category" class="form-select text-small text-capitalize">
                            <option>All</option>
                            @foreach (\App\Models\ProductsCategorie::all() as $category)
                                <option  {{ request()->category == $category->category_name ? 'selected' : null }}>{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
-->
<!-- end search-wrap-->
