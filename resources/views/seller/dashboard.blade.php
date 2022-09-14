<x-app-layout>
    <style>
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
    <div class="py-9">
        <div class="container">
            <div class="header mb-3">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link {{ \Route::currentRouteName() == 'seller.dashboard' ? 'active' :'' }}" href="{{ route('seller.dashboard') }}">Seller Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ \Route::currentRouteName() == 'dashboard' ? 'active' :'' }}" href="{{ route('dashboard') }}">User Dashboard</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card m-0">
                                <div class="card-body">
                                    {{-- <h5 class="blance-title">Sold Amount ( $ {{ number_format($seller->wallet/100, 2, ".", ",") }} )</h5> --}}
                                    <h5 class="blance-title">Available To Withdraw</h5>
                                    <p class="fw-bold">$ 80.00</p>
                                    <a href="" class="btn btn-sm btn-primary">Withdraw</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card m-0 h-100">
                                <div class="card-body">
                                    {{-- <h5 class="blance-title">Sold Amount ( $ {{ number_format($seller->wallet/100, 2, ".", ",") }} )</h5> --}}
                                    <h5 class="blance-title">Pending Balance</h5>
                                    <p class="fw-bold">$ 20</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><a class="btn btn-sm btn-primary" href="{{ route('seller.product.create') }}">Add Product</a></div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-xl-2 col-lg-3">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        @if ($product->product_variant == 0)
                                            <img src="{{ $product->uploads->getImageOptimizedFullName(400) }}"
                                                alt="" style="width: 100%;" class="mb-2">
                                            <a class="text-black" href="{{ url('products/') . '/' . $product->slug }}">
                                                <h6>{{ $product->name }}</h6>
                                            </a>
                                        @else
                                            <img src="{{ $product->uploads->getImageOptimizedFullName(400) }}"
                                            alt="" style="width: 100%;" class="mb-2">
                                            <a class="text-black" href="{{ url('products/') . '/' . $product->slug }}">
                                                <h6>{{ $product->name }} -( {{ $product->product_variant_name }} )</h6>
                                            </a>
                                        @endif
                                        <div class="fw-bold mb-2">Status : {{ $product->status == 1 ? 'Published' : 'Pending Review' }}</div>
                                        <button class="btn btn-danger pur">
                                            <i class="bi bi-pencil"></i> Edit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .blance-title{
            color: rgb(1, 119, 189);
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</x-app-layout>
