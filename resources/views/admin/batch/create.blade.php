@extends('admin.theme.main')
@section('content')
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <!-- Layouts -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">{{(isset($batch)) ? 'Update' : 'Create'}} Batch</h3>
                </div>
                <div class="block-content">
                    <!-- Layout -->
                {{--   <div class="col-lg-8 col-xl-5">--}}
                <!-- Form - Default Style -->
                    <form action="{{route('batch.createOrUpdate',['id'=>$batch->id ?? null])}}" method="POST">
                        @csrf()
                        <div class="container-fluid">
                            @include('admin.partials.success_errors_badges')
                            @if(session('stock_error'))
                                <div class="alert alert-danger text-center">
                                    <ul>
                                        @foreach(session('stock_error') as $stock_error)
                                            <li>{{$stock_error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
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
                                               value="{{old('code',$batch->code ?? ($nextId ?? ''))}}" name="code"
                                               placeholder="Code" readonly>
                                    </div>
                                    @error('code')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div><!--col-6 ended-->
                            </div><!--form-row ended-->
                            <div class="form-group form-row">
                                <div class="col-md-6">
                                    <label>Formulas <span style="color: red">*</span></label>
                                    <select class="js-select2 form-control" id="example-select2" name="formula"
                                            style="width: 100%;" data-placeholder="Choose one..">
                                        <option></option>
                                        <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                        @foreach($formulas as $formula)
                                            <option
                                                {{old('formula',$batch->formula_id ?? '') == $formula->id ? "selected" : "" }} value="{{$formula->id}}">
                                                {{$formula->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('formula')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Quantity <span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                        </div>
                                        <input type="number" class="form-control" id="example-group2-input1"
                                               value="{{old('quantity',$batch->quantity ?? "")}}" name="quantity"
                                               placeholder="Quantity">
                                    </div>
                                    @error('quantity')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div><!--col-6 ended-->
                            </div><!--form-row ended-->
                            <div class="form-group form-row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        @if(isset($batch))
                                            <button type="submit" class="btn btn-primary" onclick="change_click()"
                                                    id="button">Update
                                            </button>
                                            <button class="btn btn-primary text-white" disabled style="display: none"
                                                    id="button2">
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
