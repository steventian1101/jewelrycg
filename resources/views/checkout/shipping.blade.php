<x-app-layout page-title="Shipping Detail">
    <style>
        .shipping-radio {
            background-color: #EEEEEE !important;
        }
    </style>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-7">
                <form action="{{ url('/checkout/shipping') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom mb-3 fs-3">Shipping Options</div>
                            <div class="row mb-3">
                                @foreach ($shippings as $i => $shipping)
                                    <div class="offset-md-1 col-md-10 mb-2">
                                        <input type="radio" value="{{ $shipping->id }}" class="btn-check" name="shipping_option" id="option{{ $shipping->id }}" autocomplete="off" @if ($i == 0) checked @endif />
                                        <label class="btn btn-default shipping-radio" for="option{{ $shipping->id }}" style="width: 100%;">
                                            <span>{{ $shipping->name }} ({{ $shipping->description }})</span>
                                            <span class="float-right">${{ $shipping->price / 100 }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom mb-3 fs-3">Shipping Address</div>
                            @include('includes.validation-form')
                            <x-user-info :countries="$countries" />
                            <div class="row mb-3">
                                <div class="offset-md-3 col-md-8">
                                    <label for="isRemember">
                                        <input type="checkbox" name="isRemember" id="isRemember"> Remember Address
                                    </label>
                                    <button type="submit" class="btn btn-primary float-end">Continue</button>
                                </div>
                            </div>
                </form>
                <hr>
            </div>
        </div>
        </form>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="border-bottom mb-3 fs-3">Order Details</div>
                <x-products-table locale="checkout" :instance="'default'" />
            </div>
        </div>
    </div>
    </div>
    </div>
</x-app-layout>
