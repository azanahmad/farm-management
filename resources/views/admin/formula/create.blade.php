@extends('admin/theme/main')

@section('content')
    <main id="main-container">
        <!-- END Hero -->
        <!-- Page Content -->
        <div class="content">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Create Formula</h3>
                </div>
                <div class="block-content block-content-full">
                    @include('admin.partials.success_errors_badges')
                    <form id="create-formula" action="{{route('formula.createOrUpdate')}}" method="POST">
                        @csrf
                        <div class="form-group form-row">
                            <div class="col-md-12">
                                <label>Formula Name<span style="color: red">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                    </div>
                                    <input type="text" class="form-control" id="example-group2-input1" value=""
                                           name="formula_name" placeholder="Formula Name">
                                </div>
                                @error('formula_name')
                                <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div><!--col-12 ended-->
                        </div><!--form-row ended-->
                        <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                        <table class="table table-bordered table-striped table-vcenter" style="width: 50%!important;">
                            <thead>
                            <tr >
                                <th>Sr</th>
                                <th>Ingredient</th>
                                <th>Quantity</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php $sr = 1; @endphp
                            @foreach($ingredients as $row)
                                <tr>
                                    <td>{{$sr++}}</td>
                                    <td>{{$row->name}}</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="number" class="form-control seeds-quantity"
                                                       id="input-{{$row->name}}"
                                                       min="0" max="{{$row->quantity}}"
                                                       name="formula_quantity[{{$row->id}}]" value="0">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        KG
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--                        <span>Total Quantity : <span id="totalQuantity">0</span> KG</span>--}}
                        <div class="form-group form-row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div><!--col-6 ended-->
                        </div><!---form-row ended-->

                    </form>
                </div>
            </div>
        </div>
        <!--end Page Content-->
    </main>
@endsection
@section('extra-js')
    <script>
        $(document).ready(function () {

            // $(".batch_quantity").on("keydown keyup", function () {
            //     calculateSum();
            // });
            //
            // $(".seeds-quantity").on("keydown keyup", function () {
            //     calculateSum();
            // });
            //
            // function calculateSum() {
            //     var sum = 0;
            //
            //     //iterate through each textboxes and add the values
            //     $(".seeds-quantity").each(function () {
            //         //add only if the value is number
            //         if (!isNaN(this.value) && this.value.length != 0) {
            //             sum += parseInt(this.value);
            //         }
            //     });
            //
            //     if (sum > 100) {
            //         toastr.info("Batch quantity is exceeding to 100 KG");
            //     }
            //
            //     var batchQuantity = $("input[name='batch_quantity']").val()
            //
            //     if (!$.isNumeric(batchQuantity) && batchQuantity.length == 0) {
            //         batchQuantity = 1;
            //     }
            //     $("#totalQuantity").html(sum);
            //
            // }
        });
    </script>
@endsection
