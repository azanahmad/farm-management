@extends('admin/theme/main')

@section('content')
    <main id="main-container">
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Stock Logs</h3>
                </div>
                <div class="block-content block-content-full">

                <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th class="d-none d-sm-table-cell" style="width: 10%;">Sr.</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;">Price</th>
                            <th class="d-none d-sm-table-cell" style="width: 20%;">Quantity</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Stock</th>
                            <th class="d-none d-sm-table-cell" style="width: 40%;">Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        @foreach($stockLogs as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->price}}</td>
                                <td>{{$row->quantity}}</td>
                                <td class="d-none d-sm-table-cell"><em class="text-muted">{{ $row->stock ? "In" : "Out" }}</em></td>
                                <td class="d-none d-sm-table-cell"><em class="text-muted">{{ $row->stock ? $row->purchase_date : $row->use_date }} </em></td>
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
