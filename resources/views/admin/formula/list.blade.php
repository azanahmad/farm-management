@extends('admin/theme/main')

@section('content')
    <main id="main-container">
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Formula List</h3>
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
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Ingredients</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1;?>
                        @foreach($formulas as $row)
                            <tr>
                                <td class="text-center">{{$i++}}</td>
                                <td>{{$row->name}}</td>
                                <td class="d-none d-sm-table-cell"><em class="text-muted">
                                        @foreach($row->details as $detail)
                                            {{$detail->ingredient->name}} => {{$detail->quantity .'%'}} ,
                                        @endforeach
                                    </em>
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
