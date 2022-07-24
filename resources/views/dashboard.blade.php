<x-app-layout>

    <style>
        .sta {
            height: 150px;
        }

        .pur {
            width: 100%;
            margin-bottom: 8px;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div style="overflow: hidden">
        <div class="row p-6">
            <div class="col-md-4">
                <div class="card sta">
                    <div class="card-body">
                        <h4 class="card-title">{{ $carts }} Products</h4>
                        <h6 class="card-subtitle mb-2 text-muted">in your cart</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card sta">
                    <div class="card-body">
                        <h4 class="card-title">{{ $wishlists }} Products</h4>
                        <h6 class="card-subtitle mb-2 text-muted">in your wishlist</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card sta">
                    <div class="card-body">
                        <h4 class="card-title">{{ $orders }} Products</h4>
                        <h6 class="card-subtitle mb-2 text-muted">you ordered</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-6">
            <div class="card-body">
                <h4 class="card-title">Your Purchases</h4>
                <div class="row px-6">
                    @foreach ($purchases as $good)
                        @foreach ($good->items as $item)
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('uploads/all/' . $item->product->uploads->file_name) }}"
                                            alt="" style="width: 100%;" class="mb-2">
                                        <a href="{{ url('product/') . $item->product->slug }}">
                                            <h6>{{ $item->product->name }}</h6>
                                        </a>

                                        <button class="btn btn-primary pur">
                                            <i class="bi bi-download"></i> Download
                                        </button>
                                        <button class="btn btn-danger pur">
                                            <i class="bi bi-link"></i> Create Item
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
