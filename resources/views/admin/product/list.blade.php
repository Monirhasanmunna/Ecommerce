@extends('admin.layouts.main')

@section('css')
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Datatables -->
    <link href="{{asset('admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="x_panel">
        <div class="x_title">
            <h2>Products</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <div id="datatable-fixed-header_wrapper"
                            class="dataTables_wrapper container-fluid dt-bootstrap no-footer">
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="datatable-fixed-header"
                                        class="table table-striped table-bordered dataTable no-footer"
                                        style="width: 100%;" role="grid" aria-describedby="datatable-fixed-header_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="datatable-fixed-header" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 20px;">ID</th>
                                                <th class="sorting_asc" tabindex="0"
                                                    aria-controls="datatable-fixed-header" rowspan="1" colspan="1"
                                                    aria-sort="ascending"
                                                    aria-label="Name: activate to sort column descending"
                                                    style="width: 80px;">Image</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 150px;">Title</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 100px;">Category</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Position: activate to sort column ascending"
                                                    style="width: 100px;">Sub Category</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 50px;">Status</th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Office: activate to sort column ascending"
                                                    style="width: 50px;">Price</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Start date: activate to sort column ascending"
                                                    style="width: 40px;">Details</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable-fixed-header"
                                                     colspan="1"
                                                    aria-label="Salary: activate to sort column ascending"
                                                    style="width: 60px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $key => $product)
                                            <tr role="row" class="odd">
                                                <td>{{$key+1}}</td>
                                                <td><img style="width:50px;" src="{{asset('storage/product/'.$product->image)}}" alt="" srcset=""></td>
                                                <td>{{$product->title}}</td>
                                                <td>{{$product->subcategory->category->name}}</td>
                                                <td>{{$product->subcategory->name}}</td>
                                                <td>
                                                    @if ($product->status == 1)
                                                        <span class="badge bg-primary text-white">Published</span>
                                                    @else
                                                    
                                                        <span class="badge bg-info text-white">Unpublished</span>
                                                    
                                                    @endif
                                                </td>
                                                <td>{{$product->price}}</td>
                                                <td><a class="btn btn-sm bg-info text-white" href="{{route('admin.product.list.addDetails',[$product->id])}}">Add</a></td>
                                                <td><span><a style="color: white;" class="btn-sm bg-success" href="{{route('admin.product.edit',[$product->id])}}"><i class="fa fa-bars"></i></a> |
                                                
                                                    <form action="{{route('admin.categories.destroy',[$product->id])}}" method="post" style="display:inline;">
                                                        @method('Delete')
                                                        @csrf
                                                        <button style="border: none;" class="show-alert-delete-box btn-sm btn-danger" type="submit" type="submit"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                {{-- <div class="col-sm-5">
                                    <div class="dataTables_info" id="datatable-fixed-header_info" role="status"
                                        aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                </div> --}}
                                <div class="col-sm-7">
                                    {{-- <div class="dataTables_paginate paging_simple_numbers"
                                        id="datatable-fixed-header_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled"
                                                id="datatable-fixed-header_previous"><a href="#"
                                                    aria-controls="datatable-fixed-header" data-dt-idx="0"
                                                    tabindex="0">Previous</a></li>
                                            <li class="paginate_button active"><a href="#"
                                                    aria-controls="datatable-fixed-header" data-dt-idx="1"
                                                    tabindex="0">1</a></li>
                                            <li class="paginate_button "><a href="#"
                                                    aria-controls="datatable-fixed-header" data-dt-idx="2"
                                                    tabindex="0">2</a></li>
                                            <li class="paginate_button "><a href="#"
                                                    aria-controls="datatable-fixed-header" data-dt-idx="3"
                                                    tabindex="0">3</a></li>
                                            <li class="paginate_button "><a href="#"
                                                    aria-controls="datatable-fixed-header" data-dt-idx="4"
                                                    tabindex="0">4</a></li>
                                            <li class="paginate_button "><a href="#"
                                                    aria-controls="datatable-fixed-header" data-dt-idx="5"
                                                    tabindex="0">5</a></li>
                                            <li class="paginate_button "><a href="#"
                                                    aria-controls="datatable-fixed-header" data-dt-idx="6"
                                                    tabindex="0">6</a></li>
                                            <li class="paginate_button next" id="datatable-fixed-header_next"><a
                                                    href="#" aria-controls="datatable-fixed-header" data-dt-idx="7"
                                                    tabindex="0">Next</a></li>
                                        </ul>
                                    </div> --}}
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <!-- Datatables -->
    <script src="{{asset('admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('admin/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('admin/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event){
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this subcategory?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel","Yes!"],
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, subcategory deleted successfully!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection
