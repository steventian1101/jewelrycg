@extends('backend.dashboard.layouts.app', ['activePage' => 'products', 'title' => 'All Products', 'navName' => 'allproducts', 'activeButton' => 'catalogue'])

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <h1 class="page-header-title">All Products</h1>
    </div>
    <!-- End Row -->
</div>  

            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover">
                        <div class="card-header card-header-content-md-between">
                            <div class="row">
                                <div class="mb-2 mb-md-0">
                                    <h4 class="card-title">Products</h4>
                                    <p class="card-category">Manage products</p>
                                    <a href="{{ route('backend.products.create') }}" class="btn d-block btn-info mt-2"> Add Product </a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive datatable-custom">
                            <div class="col-md-12">
                                <table class="table table-hover table-borderless table-thead-bordered table-nowrap table-align-middle card-table dataTable no-footer">
                                    <thead class="thead-light">
                                        <th class="table-column-pe-0 sorting_disabled" aria-label="">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="datatableCheckAll">
                                                <label class="form-check-label" for="datatableCheckAll"></label>
                                            </div>
                                        </th>
                                        <th class="sorting">ID</th>
                                        <th >Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Category</th>
                                        <th>Actions</th>
                                    </thead>
                                    <tbody>
                                        
                                            @foreach ($products as $product)
                                            <tr>
                                            <td class="table-column-pe-0">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="ordersCheck1">
                                                    <label class="form-check-label" for="ordersCheck1"></label>
                                                </div>
                                            </td>
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }} $</td>
                                            <td>{{ $product->qty }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a class="btn btn-white btn-sm" href="{{ route('products.show', $product->id) }}"> <i class="bi-eye"></i> Preview </a>
                                                    <!-- Button Group -->
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-white btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="ordersExportDropdown1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                                        <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="ordersExportDropdown1" style="">
                                                            <span class="dropdown-header">Options</span>
                                                            <a href="{{ route('backend.products.edit', $product->id) }}" class="js-export-print dropdown-item">
                                                                <i class="bi-pencil-fill me-1"></i> Edit Product
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
                    </div>
                </div>


            </div>


@endsection

@section('js_content')
    <script>
        $(function() {

            $('.table').DataTable({
                processing: true,
                serverSide: true,
                bAutoWidth: false,

                ajax: '{{ route('backend.products.get') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'qty',
                        name: 'qty'
                    },
                    {
                        data: 'category',
                        name: 'category'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        });
    </script>
@endsection
