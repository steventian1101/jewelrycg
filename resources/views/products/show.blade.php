<x-app-layout :page-title="$product->name">
    <x-slot:scripts>
        <script>
            const product_images = {!! $product_images_in_json !!};
        </script>
    </x-slot>
    <div class="row">
        <div class="col-4 card">
            <div class="card-body">
                <a href="{{asset($product->images->first()->path)}}" target="_blank">
                    <img id="main-image" src="{{asset($product->images->first()->path)}}" class="img-fluid d-block mx-auto border" alt="0">
                </a>
                <div class="d-flex justify-content-between">
                    @if ($is_img_more_than_3 = $product->images->count() > 3)
                        <a href="javascript:;" onclick="showImage(false)" class="text-decoration-none link-secondary d-flex">
                            <i class="fa-solid fa-arrow-left my-auto"></i>
                        </a>
                    @endif
                    @foreach ($product->images as $key => $image)
                        @if ($key < 3)
                            <a href="javascript:;" onclick="changeMainImage(this)" class="text-decoration-none border">
                                <img src="{{asset($image->path)}}" class="img-fluid product-small-images carousel-img" alt="{{$key}}">
                            </a>
                        @endif
                    @endforeach
                    @if ($is_img_more_than_3)
                        <a href="javascript:;" onclick="showImage(true)" class="text-decoration-none link-secondary d-flex">
                            <i class="fa-solid fa-arrow-right my-auto"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6 card">
            <div class="card-body">
                <div class="row">
                    <h1 class="col-8">
                        {{$product->name}}
                    </h1>
                    @auth
                        @if (auth()->user()->is_admin)
                            <div class="col-4 h1" align="end">
                                <a href="{{route('products.edit', $product->id)}}" class="btn btn-outline-primary">Edit</a>
                                <form action="{{route('products.destroy', $product)}}" method="post" class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
                <h4 class="text-warning">
                    ${{$product->price}}
                </h4>
                @if (session('wishlist-message'))
                    <h4 class="text-center text-success">
                        {{session('wishlist-message')}}
                    </h4>
                @endif
                <h4>
                    @auth
                        @if ($wishlist_product = Cart::instance('wishlist')->content()->firstWhere('id', $product->id))
                            <form action="{{route('cart.wishlist')}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="row_id" value="{{$wishlist_product->rowId}}">
                                <button type="submit" class="badge badge-lg bg-danger-1 border border-danger-1 text-light rounded-pill">
                                    <i class="fa-solid fa-x"></i>
                                    <small>Remove from Wishlist</small>
                                </button>
                            </form>
                        @else
                            <form action="{{route('cart.wishlist')}}" method="post" class="d-inline">
                                @csrf
                                <input type="hidden" name="id_product" value="{{$product->id}}">
                                <button type="submit" class="badge badge-lg bg-primary border border-primary text-light rounded-pill">
                                    <i class="fa-regular fa-heart"></i>
                                    <small>Add To Wishlist</small>
                                </button>
                            </form>
                        @endif
                    @endauth
                    @if ($product->qty)
                        <span class="badge badge-lg bg-success text-light rounded-pill"><small>On Stock: {{$product->qty}}</small></span>
                    @else
                        <span class="badge badge-lg bg-danger text-light rounded-pill"><small>Out of Stock</small></span>
                    @endif
                </h4>
                <p>
                    {{$product->desc}}
                </p>
            </div>
        </div>
        <div class="col-md-2 border p-3">
            <div class="small">Details about delivery:</div>
            <div class="small">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ultrices sapien eu eleifend pulvinar. Sed ut dui erat. Nullam euismod erat sit amet risus pharetra, in consectetur tortor eleifend. Curabitur luctus molestie finibus.
            </div>
            <div class="text-warning text-center">${{$product->price}}</div>
            @if (session('message'))
                <div class="text-success">
                    {{session('message')}}
                </div>
            @endif
            <form action="{{route('cart.store')}}" method="post" class="my-3">
                @csrf
                <input type="hidden" name="id_product" value="{{$product->id}}">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn pill rounded-pill btn-yellow" {{ $product->qty < 1 ? 'disabled' : null }}>Add to Cart</button>
                    <button type="submit" formaction="{{route('cart.buy.now')}}" class="btn pill rounded-pill btn-warning" {{ $product->qty < 1 ? 'disabled' : null }}>Buy Now</button>
                </div>
            </form>
            <div class="small">
                Orci varius natoque penatibus et magnis dis parturient montes.
            </div>
        </div>
    </div>
    <div class="related-products"></div>
    <div class="clients-comments"></div>
</x-app-layout>