@extends('admin/theme/main')
@section('content')
    <main id="main-container">
        <!-- Page Content -->
        <div class="content">
            <!-- Layouts -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    @if(isset($edit))
                        <h3 class="block-title">Edit User</h3>
                    @else
                        <h3 class="block-title">Add User</h3>
                    @endif
                </div>
                <div class="block-content">
                    <!-- Layout -->
                {{--   <div class="col-lg-8 col-xl-5">--}}
                <!-- Form - Default Style -->
                    <form  @if(isset($edit)) action="{{route('users.update',['id'=>$edit->id])}}"
                           @else
                           action="{{route('users.add')}}"
                           @endif
                           method="POST">
                        @csrf()
                        <div class="container-fluid">

                            <div class="form-group form-row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    @if(session('success'))
                                        <div class="alert alert-success text-center">{{session('success')}}</div>
                                    @endif
                                    @if(session('error'))
                                        <div class="alert alert-danger text-center">{{session('error')}}</div>
                                    @endif
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="form-group form-row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <label>Name<span style="color: red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-user"></i>
                                                    </span>
                                        </div>
                                        <input type="text" class="form-control" id="example-group2-input1" value="{{old('name',$edit->name ?? "")}}" name="name" placeholder="Username">
                                    </div>
                                    @error('name')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div><!--col-6 ended-->
                            </div><!--form-row ended-->
                            <div class="form-group form-row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <label>Email<span style="color: red">*</span></label>
                                    <div class="input-group">

                                        <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-envelope-open"></i>
                                                    </span>
                                        </div>

                                        <input type="text" class="form-control" value="{{old('email',$edit->email ?? "")}}" name="email" placeholder="Email">
                                    </div>
                                    @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                    @enderror
                                </div><!--col-6 ended-->
                            </div><!---form-row ended-->
                            @if(!isset($edit))
                                <div class="form-group form-row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">

                                        <label>Password<span style="color: red">*</span></label>


                                        <div class="input-group">

                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-lock"></i>
                                                    </span>
                                            </div>

                                            <input type="password" class="form-control" id="example-group2-input1" name="password" placeholder="Password">
                                        </div>
                                        @error('password')
                                        <div class="alert alert-danger">{{$message}}</div>
                                        @enderror
                                    </div><!--col-6 ended-->
                                </div><!---form-row ended-->

                                <div class="form-group form-row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <label>Confirm Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-lock"></i>
                                                    </span>
                                            </div>
                                            <input type="password" class="form-control" id="example-group2-input1" name="password_confirmation" placeholder="Confirm Password">
                                            @error('password_confirmation')
                                            <div class="alert alert-danger">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div><!--col-6 ended-->
                                </div><!---form-row ended-->
                            @endif
                            <div class="form-group form-row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        @if(isset($edit))
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
