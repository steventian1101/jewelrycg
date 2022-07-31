<x-app-layout page-title="Cart">

<div class="py-9 cart-wrap">
    <div class="container">
        <div class="card">
            @if (session('message'))
                <h4 class="text-center text-danger mt-3">
                    {{session('message')}}
                </h4>
            @endif
            <div class="card-body">
                <x-products-table locale="cart"/>
            </div>
        </div>  
    </div>
</div>      
</x-app-layout>
