<x-app-layout :page-title="'Order ' . $order->id">
    <div class="container">
        <div class="col-lg-8 col-md-10 py-8 mx-auto checkout-wrap">
            <h1 class="fw-800">Thanks for shopping with us!</h1>
            <p>We appreciate your order, we’re currently processing it. So hang tight, and we’ll send you confirmation
                very soon!</p>
            <div class="order-items-card border-bottom py-4 mb-4">
                <div class="row">
                    <div class="col-lg-3 col-6 mb-2">
                        <div class="w-100 fs-18 fw-600">Order number</div>
                        <div class="fs-14 text-primary">#0000</div>
                    </div>
                    <div class="col-lg-5 col-6 mb-2">
                        <div class="w-100 fs-18 fw-600">Payment status</div>
                        <div class="fs-14 ">Paid</div>
                    </div>
                    <div class="col-lg-2 col-6 mb-2">
                        <div class="w-100 fs-18 fw-600">Fufilment status</div>
                        <div class="fs-14 ">#0000</div>
                    </div>
                    <div class="col-lg-2 col-6 mb-2">
                        <div class="w-100 fs-18 fw-600">Date created</div>
                        <div class="fs-14 ">July 30, 2022</div>
                    </div>
                </div>
            </div>

            @foreach ($order->items as $key => $item)
            <div class="order-items-card pb-4">
                <div class="row">
                    <div class="col-lg-3 col-6 mb-2"><span class="fw-600">{{ $item->order_id }}</span></div>
                    <div class="col-lg-5 col-6 mb-2">
                        <div class="row">
                            <div class="col-lg-3 col-4">
                                <img src="{{ $item->product->getThumbnailFilePath() }}" alt=""
                                    class="thumbnail border w-100">
                            </div>
                            <div class="col-lg-9 col-8">
                                <div class="order-item-title fs-24 py-2 fw-600">
                                    @php
                                    if ($item->product_variant != 0) {
                                    echo $item->product_name . ' - ' . $item->product_variant_name;
                                    } else {
                                    echo $item->product_name;
                                    }
                                    @endphp
                                </div>
                                <div class="order-item-qty-price fs-16 pb-2"><span class="fw-600">Quantity</span>
                                    {{$item->quantity}} | <span class="fw-600">Price</span> ${{
                                    number_format($item->price /
                                    100, 2) }}</div>
                                @if ($item->product->is_digital)
                                <div class="is_downloadable fw-600 fs-16">
                                    @if ($item->product_variant)
                                    <a href="javascript:;" class="variant_download"
                                        data-variant-id="{{ $item->product_variant }}">
                                        <i class="bi bi-file-earmark-arrow-down"></i> Download</a>
                                    @else
                                    <a href="javascript:;" class="product_download" data-product-id="{{ $item->product_id }}">
                                        <i class="bi bi-file-earmark-arrow-down"></i> Download</a>
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-6 mb-2">
                        <span class="fw-600">{{
                            Config::get('constants.order_item_status_fulfillment')[$item->status_fulfillment] }}</span>
                    </div>
                    <div class="col-lg-2 col-6 mb-2">
                        <span class="fw-600">{{ $item->created_at }}</span>
                    </div>
                    <!--<div class="col-lg-2">${{ number_format($item->price / 100, 2) }}</div>-->
                </div>
            </div>
            @endforeach

            <div class="col-lg-4">
                <h5 class="fs-18 py-2 fw-600">Billing Address</h5>
                @include('includes.validation-form')
                <x-order-info :order="$order" />
            </div>

        </div>

        <script>
            $(function () {
                $('.variant_download').click(function () {
                    document.location.replace("{{ url('product/download') }}" + "?variant_id=" + $(this).attr('data-variant-id'));
                });

                $('.product_download').click(function () {
                    document.location.replace("{{ url('product/download') }}" + "?product_id=" + $(this).attr('data-product-id'));
                })
            })
        </script>

</x-app-layout>