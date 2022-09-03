<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('admin/dist/images/logo/kazi.jpg')}}">
    @include('layouts.title')
    
    <!-- page css -->
    <link href="{{ asset('admin/dist/css/pages/login-register-lock.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('admin/dist/css/style.min.css')}}" rel="stylesheet">
    @livewireStyles
</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    @include('layouts.preloader')
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image: linear-gradient(to bottom, rgba(0, 0, 77, 0.82), rgba(0, 0, 77, 0.90)),
    url('admin/dist/affiliate.png');">
        <div class="text-center font-weight-1500 image">
        <span style="font-size:38px; color:#ff8000; font-family: Times New Roman, Times, serif;">Kazi Masters Limited</span>
         <br><span style="font-size:26px; color:#fff; font-family: Times New Roman, Times, serif;"></span>
         <br><x-jet-validation-errors class="font-weight-1800 btn btn-sm bg-white mb-1"  style="font-size:16px; color:#ff8000; font-family: Times New Roman, Times, serif;"/>
        </div>
            <div class="login-box card" style="background-color:#f2f2f2;">
                <div class="card-body">
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                    <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
                        @csrf
                    <h3 class="text-center"><img type="image/png" style="width:100px;height:50px;" src="{{asset('admin/dist/images/logo/kazi.jpg')}}"></h3>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="email">Email</label>
                                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                            <label for="password">Password</label>
                                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password"> </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                                        <label class="form-check-label" for="remember_me">Remember me</label>
                                    </div> 
                                    <div class="ms-auto">
                                        @if (Route::has('password.request'))
                                        <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fas fa-lock m-r-5"></i> Forgot password?</a> 
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-t-5 mb-5">
                                <button class="btn w-100 btn-md btn-info text-white" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="recoverform" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="email" class="form-control"  type="email" name="email" :value="old('email')" required autofocus> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-lg w-100 text-uppercase waves-effect waves-light" type="submit">Email Password Reset Link</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('admin/dist/js/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('admin/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    @livewireScripts
</body>
</html>