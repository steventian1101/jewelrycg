<x-app-layout :page-title="'Order ' . $order->id">
    <div class="container">
        <div class="col-lg-8 col-md-10 py-9 mx-auto checkout-wrap">
            <h1 class="fw-800 mb-3">Thanks for shopping with us!</h1>
            <p>We appreciate your order, we’re currently processing it. So hang tight, and we’ll send you confirmation
                very soon!</p>
            <div class="order-items-card border-bottom py-4 mb-5">
                <div class="row">
                    <div class="col-lg-3 col-6 mb-2">
                        <div class="w-100 fs-18 fw-600">Order number</div>
                        <div class="fs-14 text-primary">#{{ $order->order_id }}</div>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <div class="w-100 fs-18 fw-600">Payment status</div>
                        <div class="fs-14 ">
                            {{ ucwords(Config::get('constants.oder_payment_status')[$order->status_payment]) }}</div>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <div class="w-100 fs-18 fw-600">Fufilment status</div>
                        <div class="fs-14 ">
                            @php
                                $status = 'Fulfilled';
                                foreach ($order->items as $key => $item) {
                                    if ($item->status_fulfillment == '1') {
                                        $status = 'Unfulfilled';
                                    }
                                }
                                
                                echo $status;
                            @endphp
                        </div>
                    </div>
                    <div class="col-lg-3 col-6 mb-2">
                        <div class="w-100 fs-18 fw-600">Date created</div>
                        <div class="fs-14 ">{{ date('F d, Y', strtotime($order->created_at)) }}</div>
                    </div>
                </div>
            </div>

            @foreach ($order->items as $key => $item)
                <div class="order-items-card pb-4">
                    <div class="row">
                        <div class="col-lg-2 col-3">
                            <img src="{{ $item->product->uploads->getImageOptimizedFullName(150) }}" alt=""
                                class="thumbnail border w-100">
                        </div>
                        <div class="col-lg-10 col-9">
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
                                {{ $item->quantity }} | <span class="fw-600">Price</span>
                                ${{ number_format($item->price / 100, 2) }}</div>
                            <div class="is_downloadable fw-600 fs-16 mt-2" data-item-id="{{ $item->id }}"
                                data-product-id="{{ $item->product->id }}"
                                data-product-digital-assets="{{ $item->product->digital_download_assets }}">
                                @if ($item->product->is_digital)
                                    @if (!$item->product->digital_download_assets)
                                        <span class="fw-900 fs-14 badge bg-danger">No digital asset attached</span>
                                        <div class="order-item-title fs-17 fw-600 mt-2">File anavailable. Please contact
                                            support.</div>
                                    @else
                                        <span class="fw-900 fs-14 badge bg-success">Digital asset attached</span>
                                        <span class="fw-900 fs-14 mt-2 d-block" class=""
                                            data-product-id="{{ $item->id }}">{{ $item->product->digitalImage->file_original_name . '.' . $item->product->digitalImage->extension }}</span>
                                    @endif
                                @endif

                                @php
                                    $orderStatus = Config::get('constants.order_item_status_fulfillment');
                                @endphp
                                <div class="d-flex mt-2">
                                    <span class="d-block" data-item-id="{{ $item->id }}">
                                        @foreach ($orderStatus as $key => $status)
                                            @if ($key != 0)
                                                @if ($item->status_fulfillment == $key) {{$status}} @endif
                                            @endif
                                        @endforeach
                                        @if ($item->status_fulfillment == 2) {{ ", Tracking Number: " . $item->status_tracking }}  @endif 
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-lg-4 mt-3">
                <h5 class="fs-18 py-2 fw-600">Billing Address</h5>
                @include('includes.validation-form')
                <x-order-info :order="$order" />
            </div>
        </div>

        <script>
            $(function() {
                $('.variant_download').click(function() {
                    document.location.replace("{{ url('product/download') }}" + "?variant_id=" + $(this).attr(
                        'data-variant-id'));
                });

                $('.product_download').click(function() {
                    document.location.replace("{{ url('product/download') }}" + "?product_id=" + $(this).attr(
                        'data-product-id'));
                })
            })
        </script>

</x-app-layout>
