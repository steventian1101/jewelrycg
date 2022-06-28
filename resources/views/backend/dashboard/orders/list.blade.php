@extends('backend.dashboard.layouts.app', ['activePage' => 'orders', 'title' => 'All Orders', 'navName' => 'orderslist', 'activeButton' => 'catalogue'])

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <h1 class="page-header-title">All Orders</h1>
    </div>
    <!-- End Row -->
</div>  

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    @if (auth()->user()->is_admin)
                        <th scope="col">User Id</th>
                    @endif
                    <th scope="col">Status</th>
                    <th scope="col">Order Number</th>
                    <th scope="col">Message</th>
                    <th scope="col">Products</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        @if (auth()->user()->is_admin)
                            <td>
                                <a href="{{route('user.index', $order->id_user)}}" class="link-primary">
                                    {{$order->id_user}}
                                </a>
                            </td>
                        @endif
                        <td class="link-info">{{$order->status}}</td>
                        <td><a href="javascript:;" onclick="copyText(this)" class="link-secondary">{{$order->tracking_number}}</a></td>
                        <td>{{$order->message}}</td>
                        <td>{{$order->items_count}}</td>
                        <td>${{$order->total_price}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-white btn-sm" 
                                    >
                                    <i class="bi-list"></i> Details
                            </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>        
<div class="text-center">
    {{$orders->links()}}
</div>
@endsection
