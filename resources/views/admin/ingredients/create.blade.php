@extends('admin.theme.main')
@section('content')
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <!-- Layouts -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    @if(isset($ingredient))
                        <h3 class="block-title">Edit ingredient</h3>
                    @else
                        <h3 class="block-title">Add ingredient</h3>
                    @endif
                </div>
                <div class="block-content">
                    <!-- Layout -->
                {{--   <div class="col-lg-8 col-xl-5">--}}
                <!-- Form - Default Style -->
                    <form action="{{route('ingredients.createOrUpdate',['id'=>$ingredient->id ?? null])}}" method="POST">
                        @csrf()
                        <div class="container-fluid">
                            @include('admin.partials.success_errors_badges')
                            <div class="form-group form-row">
                                <div class="col-md-12">
                                    <label>Code<span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                        </div>
                                        <input type="text" class="form-control" id="example-group2-input1" value="{{old('code',$ingredient->code ?? ($nextId ?? ''))}}" name="code" placeholder="Code" readonly>
                                    </div>
                                    @error('code')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div><!--col-6 ended-->
                            </div><!--form-row ended-->
                            <div class="form-group form-row">
                                <div class="col-md-6">
                                    <label>Name<span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                        </div>
                                        <input type="text" class="form-control" id="example-group2-input1" value="{{old('name',$ingredient->name ?? "")}}" name="name" placeholder="Name">
                                    </div>
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div><!--col-6 ended-->
                                <div class="col-md-6">
                                    <label>Description<span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                        </div>
                                        <input type="text" class="form-control" id="example-group2-input1" value="{{old('description',$ingredient->description ?? "")}}" name="description" placeholder="Description">
                                    </div>
                                    @error('description')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
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
                                        <input type="text" class="form-control" id="example-group2-input1" value="{{old('price',$ingredient->price ?? "")}}" name="price" placeholder="Price">
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
                                        <input type="number" class="form-control" id="example-group2-input1" value="{{old('quantity',$ingredient->quantity ?? "")}}" name="quantity" placeholder="Quantity">
                                    </div>
                                    @error('quantity')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div><!--col-6 ended-->
                            </div><!--form-row ended-->
                            <div class="form-group form-row">
                                <div class="col-md-6">
                                    <label>Quantity Alert<span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                        </div>
                                        <input type="number" class="form-control" id="example-group2-input1" value="{{old('quantity_alert',$ingredient->quantity_alert ?? "")}}" name="quantity_alert" placeholder="Quantity alert">
                                    </div>
                                    @error('quantity_alert')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div><!--col-6 ended-->
                                <div class="col-md-6">
                                    <label>Purchase Date<span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                        </div>
                                        <input type="date" class="form-control" id="example-group2-input1" value="{{old('purchase_date',$ingredient->purchase_date ?? now()->toDateString())}}" name="purchase_date" placeholder="Purchase date">
                                    </div>
                                    @error('purchase_date')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div><!--col-6 ended-->
                            </div><!--form-row ended-->
                            <div class="form-group form-row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        @if(isset($ingredient))
                                            <button type="submit" class="btn btn-primary" onclick="change_click()" id="button">Update</button>
                                            <button class="btn btn-primary text-white" disabled style="display: none" id="button2">
                                                <i class="fa  fa-spinner"></i> Loading...
                                            </button>
                                        @else
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        @endif
                                    </div>
                                </div><!--col-6 ended-->
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
