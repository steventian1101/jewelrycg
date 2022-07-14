@extends('backend.layouts.app', ['activePage' => 'products', 'title' => 'All Products', 'navName' => 'allproducts', 'activeButton' => 'catalogue'])

@section('content')
<div class="page-header">
    <div class="row align-items-center mb-3">
        <div class="col-sm mb-2 mb-sm-0">
            <h1 class="page-header-title">Products <span class="badge bg-soft-dark text-dark ms-2">72,031</span></h1>
        </div>
        <!-- End Col -->

        <div class="col-sm-auto">
            <a class="btn btn-primary" href="{{ route('backend.products.create') }}">Create product</a>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Row -->
</div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card strpied-tabled-with-hover rounded-0">
                        <div class="table-responsive datatable-custom">
                            <div class="col-md-12">
                                <table class="table table-lg table-thead-bordered table-nowrap table-align-middle card-table dataTable table-hover no-footer">
                                    <thead class="thead-light">
                                        <th class="sorting_disabled" aria-label="">
                                            <div class="form-checkbox">
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
                                            <td>{{ $product->product_category->category_name }}</td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a class="btn btn-dark btn-sm" href="{{ route('backend.products.edit', $product->id) }}"> <i class="bi-pencil"></i> Edit </a>
                                                    <!-- Button Group -->
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-dark btn-icon btn-sm dropdown-toggle dropdown-toggle-empty" id="ordersExportDropdown1" data-bs-toggle="dropdown" aria-expanded="false"></button>
                                                        <div class="dropdown-menu dropdown-menu-end mt-1" aria-labelledby="ordersExportDropdown1" style="">
                                                            <span class="dropdown-header">Options</span>
                                                            <div class="dropdown-divider"></div>
                                                            <a onclick="return confirm('Are you sure you want to delete this product?')" class="dropdown-item" href="{{ route("backend.products.delete", $product->id) }}"> <i class="bi-trash dropdown-item-icon"></i> Delete </a>
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
