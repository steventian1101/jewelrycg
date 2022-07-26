<x-app-layout page-title="Shipping Detail">
    <style>
        .tax-radio {
            background-color: #EEEEEE !important;
        }
    </style>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-7">
                <form action="{{ url('/checkout/billing') }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="border-bottom mb-3 fs-3">Billing Address</div>
                            @include('includes.validation-form')
                            <x-user-info :countries="$countries" />
                            <div class="row mb-3">
                                <div class="offset-md-3 col-md-8">
                                    <label for="isRemember">
                                        <input type="checkbox" name="isRemember" id="isRemember"> Remember Address
                                    </label>
                                    <input type="hidden" value="{{ isset($orderId) ? $orderId : 0 }}" />
                                    <button type="submit" class="btn btn-primary float-end">Continue</button>
                                </div>
                            </div>
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
