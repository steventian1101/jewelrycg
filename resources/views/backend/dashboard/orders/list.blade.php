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
        <table class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table dataTable no-footer">
            <thead class="thead-light">
                <tr role="row">
                    <th class="table-column-pe-0 sorting_disabled" rowspan="1" colspan="1" aria-label="" style="width: 24px;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                            <label class="form-check-label" for="datatableCheckAll"></label>
                        </div>
                    </th>
                    <th class="table-column-ps-0 sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Order: activate to sort column ascending" style="width: 70px;">Order</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Payment status: activate to sort column ascending">Order Total</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Date: activate to sort column ascending" style="width: 161px;">Date</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Customer: activate to sort column ascending" style="width: 130px;">Customer</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Fulfillment status: activate to sort column ascending" style="width: 150px;">Fulfillment status</th>
                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 119px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td class="table-column-pe-0">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="ordersCheck1">
                                <label class="form-check-label" for="ordersCheck1"></label>
                            </div>
                        </td>
                        <td><a href="javascript:;" onclick="copyText(this)" class="link-secondary">{{$order->tracking_number}}</a></td>
                        <td>${{$order->total_price}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>
                            <a href="{{route('user.index', $order->id_user)}}" class="link-primary">
                                {{$order->id_user}}
                            </a>
                        </td>
                        <td>{{$order->status}}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a class="btn btn-white btn-sm" href="{{ route('orders.show', $order->id) }}"> <i class="bi-eye"></i> View </a>
                                <!-- Button Group -->
                                <div class="btn-group">
                                    <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="ordersExportDropdown1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="ordersExportDropdown1" style="">
                                        <span class="dropdown-header">Options</span>
                                        <a class="js-export-print dropdown-item" href="javascript:;">
                                            <img class="avatar avatar-xss avatar-4x3 me-2" src="./assets/svg/illustrations/print-icon.svg" alt="Image Description"/>
                                            Print
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <span class="dropdown-header">Download options</span>
                                        <a class="js-export-excel dropdown-item" href="javascript:;">
                                            <img class="avatar avatar-xss avatar-4x3 me-2" src="./assets/svg/brands/excel-icon.svg" alt="Image Description"/>
                                            Excel
                                        </a>
                                        <a class="js-export-csv dropdown-item" href="javascript:;">
                                            <img class="avatar avatar-xss avatar-4x3 me-2" src="./assets/svg/components/placeholder-csv-format.svg" alt="Image Description" />
                                            .CSV
                                        </a>
                                        <a class="js-export-pdf dropdown-item" href="javascript:;">
                                            <img class="avatar avatar-xss avatar-4x3 me-2" src="./assets/svg/brands/pdf-icon.svg" alt="Image Description"/>
                                            PDF
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:;"> <i class="bi-trash dropdown-item-icon"></i> Delete </a>
                                    </div>
                                </div>
                                <!-- End Unfold -->
                            </div>
                            <!-- End Button -->
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
