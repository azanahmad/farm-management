@extends('admin/theme/main')

@section('content')
    <main id="main-container">
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Ingredient List</h3>
                </div>
                <div class="block-content block-content-full">

                    @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                @endif
                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">Code</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Price</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Quantity</th>

                            <th class="d-none d-sm-table-cell" style="width: 15%;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        @foreach($ingredients as $row)
                            <tr>
                                <td >{{$row->code}}</td>
                                <td >{{$row->name}}</td>
                                <td class="d-none d-sm-table-cell"><em class="text-muted">{{$row->price}}</em></td>
                                <td class="d-none d-sm-table-cell"><em class="text-muted">{{$row->quantity}} </em></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button type="button" onclick="window.location.href='{{route('ingredients.edit',['id'=>$row->id])}}';"  class="btn btn-sm btn-primary js-tooltip-enabled" data-toggle="tooltip" title="Edit" data-original-title="Edit">
                                            <i class="fa fa-pencil-alt" style="color: #fff0ff;"></i>
                                        </button>
                                        <button type="button"  onclick="window.location.href='{{route('ingredients.delete',['id'=>$row->id])}}';" class="btn btn-sm btn-danger js-tooltip-enabled" data-toggle="tooltip" title="Delete" data-original-title="Delete">
                                            <i class="fa fa-times" style="color: #fff0ff;"></i>
                                        </button>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end Page Content-->
    </main>
@endsection
