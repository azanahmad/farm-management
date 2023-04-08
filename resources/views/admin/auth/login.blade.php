@extends('admin.theme.frontend')

@section('content')
    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('assets/media/photos/photo22@2x.jpg');">
                <div class="row no-gutters bg-primary-op">
                    <!-- Main Section -->
                    <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                        <div class="p-3 w-100">
                            <!-- Header -->
                            <div class="mb-3 text-center">
                                <a class="link-fx font-w700 font-size-h1" href="#">
                                    <span class="text-dark">Farm </span><span class="text-primary">Management</span>
                                </a>
                                <p class="text-uppercase font-w700 font-size-sm text-muted">Sign In</p>
                            </div>
                            <!-- END Header -->

                            <!-- Sign In Form -->
                            <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <div class="row no-gutters justify-content-center">
                                <div class="col-sm-8 col-xl-6">
                                    @if(session('error'))
                                        <div class="alert alert-danger">{{ session('error')}}</div>


                                    @endif
                                    @if(session('message'))
                                        <div class="alert alert-success">{{ session('message')}}</div>

                                    @endif
                                    <form class="js-validation-signin" action="{{route('authenticate')}}" method="POST">
                                        @csrf
                                        <div class="py-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-alt" id="login-username" name="email" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-lg form-control-alt" id="login-password" name="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn-hero-lg btn-hero-primary">
                                                <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                    <!-- END Main Section -->

                    <!-- Meta Info Section -->
                    <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
                        <div class="p-3">
                            <p class="display-4 font-w700 text-white mb-3">
                                Welcome to the future
                            </p>
                            <p class="font-size-lg font-w600 text-white-75 mb-0">
                                Copyright &copy; <span data-toggle="year-copy"></span>
                            </p>
                        </div>
                    </div>
                    <!-- END Meta Info Section -->
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
@endsection
