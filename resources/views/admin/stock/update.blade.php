@extends('admin.theme.main')
@section('content')
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <!-- Layouts -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Update Stock : ({{$stock->name}})</h3>
                </div>
                <div class="block-content">
                    <!-- Layout -->
                {{--   <div class="col-lg-8 col-xl-5">--}}
                <!-- Form - Default Style -->
                    <form action="{{route('stock.update',['id'=>$stock->id])}}" method="POST">
                        @csrf()
                        <div class="container-fluid">
                            @include('admin.partials.success_errors_badges')
                            <div class="form-group form-row">
                                <div class="col-md-12">
                                    <label>Code</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                        </div>
                                        <input type="text" class="form-control" id="example-group2-input1"
                                               value="{{old('code',$stock->code)}}" placeholder="Code" readonly>
                                    </div>
                                </div><!--col-6 ended-->
                            </div><!--form-row ended-->
                            <div class="form-group form-row">
                                <div class="col-md-12">
                                    <label>Available Quantity</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                        </div>
                                        <input type="text" class="form-control" id="example-group2-input1"
                                               value="{{$stock->quantity}}" readonly>
                                    </div>
                                </div><!--col-6 ended-->
                            </div><!--form-row ended-->
                            <div class="form-group form-row">
                                <div class="col-md-6">
                                    <label>Price<span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                        </div>
                                        <input type="text" class="form-control" id="example-group2-input1"
                                               value="{{old('price',$stock->price ?? "")}}" name="price"
                                               placeholder="Price">
                                    </div>

                                    @error('price')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div><!--col-6 ended-->
                                <div class="col-md-6">
                                    <label>Quantity<span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                        </div>
                                        <input type="number" class="form-control" id="example-group2-input1"
                                               value="{{old('quantity')}}" name="quantity"
                                               min="0"
                                               placeholder="Quantity">
                                    </div>
                                    @error('quantity')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div><!--col-6 ended-->
                            </div><!--form-row ended-->
                            <div class="form-group form-row">
                                <div class="col-md-1.5">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-primary" onclick="change_click()"
                                                id="button">Update Stock
                                        </button>
                                        <button class="btn btn-primary text-white" disabled style="display: none"
                                                id="button2">
                                            <i class="fa  fa-spinner"></i> Loading...
                                        </button>
                                    </div>
                                </div><!--col-6 ended-->
                                <div class="col-md-1.5">
                                    <div class="input-group">
                                        <button type="button" class="btn btn-secondary" onclick='window.location.href="{{route('stock.list')}}"'>Go back
                                        </button>
                                    </div>
                                </div>
                            </div><!---form-row ended-->
                        </div>
                    </form>
                    <!-- END  Layout -->
                </div>
            </div>
            <!-- END Layouts -->
        </div>
        <!-- END Page Content -->
    </main>
@endsection
