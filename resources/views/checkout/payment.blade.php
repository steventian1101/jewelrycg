<x-app-layout page-title="Payment">
    <div class="container">
        <div class="billing_address">
            <input type="hidden" id="phone" value="{{ Session::get('billing_phonenumber') }}">
            <input type="hidden" id="address1" value="{{ Session::get('billing_address1') }}">
            <input type="hidden" id="address2" value="{{ Session::get('billing_address2') }}">
            <input type="hidden" id="city" value="{{ Session::get('billing_city') }}">
            <input type="hidden" id="state" value="{{ Session::get('billing_state') }}">
            <input type="hidden" id="country" value="{{ Session::get('billing_country') }}">
            <input type="hidden" id="pin_code" value="{{ Session::get('billing_zipcode') }}">
        </div>
        <form id="payment-form">
            <div class="row mb-3">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom mb-3">Pyament Information</div>
                            <div id="payment-element">
                                <!--Stripe.js injects the Payment Element-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom mb-3">Order Details</div>
                            <x-products-table locale="checkout" :instance="isset($buy_now_mode) && $buy_now_mode == 1 ? 'buy_now' : 'default'" />
                            <div class="d-grid gap-2">
                                <button id="submit" class="btn btn-primary">
                                    <div class="spinner hidden" id="spinner"></div>
                                    <span id="button-text">Pay now</span>
                                </button>
                                <div id="payment-message" class="hidden text-center text-danger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <x-slot:scripts>
        <script src="https://js.stripe.com/v3/"></script>
        <script defer>
            const stripe_key = '{{ config('app.stripe_key') }}';
            const payment_intent_route = '{{ route('checkout.payment.intent') }}';
            const _token = '{{ csrf_token() }}';
            const place_order_route = '{{ route('checkout.store') }}';
            const order_cancel_route = '{{ route('checkout.cancel') }}';
            const finish_page = '{{ route('checkout.finished') }}';
            const buy_now_mode = '{{ $buy_now_mode ?? 0 }}';
        </script>
        <script src="{{ asset('js/checkout.js') }}" defer></script>
        </x-slot>
</x-app-layout>
