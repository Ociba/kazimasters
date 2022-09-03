<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
@include('layouts.css')
<link href="http://eliteadmin.themedesigner.in/demos/bt4/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="{{ asset('admin/dist/css/pages/file-upload.css')}}" rel="stylesheet">
</head>

<body class="skin-blue fixed-layout">

    <!-- Preloader - style you can find in spinners.css -->

    @include('layouts.preloader')

    <!-- Main wrapper - style you can find in pages.scss -->

    <div id="main-wrapper">
        <!-- Topbar header - style you can find in pages.scss -->
        @include('layouts.navbar')
        <!-- End Topbar header -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        @include('layouts.sidebar')
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                @include('layouts.breadcrumb')
                @include('layouts.messages')
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- .content -->
                <div class="row">
                    <!-- Column -->
                    @foreach($get_users_info as $user)
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            @if($user->profile_photo_path == null)
                            <div class="user-bg"> <img width="100%" height="350px" alt="user" src="{{ asset('user_photo/mariba.png')}}"> </div>
                            @else
                            <div class="user-bg"> <img width="100%" height="350px" alt="user" src="{{ asset('user_photo/'.$user->profile_photo_path)}}"> </div>
                            @endif
                            {{--<div class="card-body">
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-5 border-end">
                                        <strong>Name</strong>
                                        <p>{{$user->name}}</p>
                                    </div>
                                    <div class="col-md-7"><strong>Email</strong>
                                        <p>{{$user->email}}</p>
                                    </div>
                                </div>
                                <hr>
                                <!-- /.row -->
                            </div>--}}
                        </div>
                    </div>
                    @endforeach
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">Upload Photo</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#email" role="tab">Change Email</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">Change Password</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">My Details</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">
                                        <form class="form-horizontal mt-4" action="/upload-photo" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label class="form-label">Upload Photo</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                                    <div class="custom-file">
                                                        <input type="file" class="form-control" id="inputGroupFile01" name="profile_photo_path" aria-describedby="inputGroupFileAddon01">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 offset-2">
                                            <button type="submit" class="btn btn-info waves-effect waves-light m-r-10 text-white">Submit</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <!--Email-->
                                <div class="tab-pane" id="email" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">
                                        <form class="form-horizontal mt-4" action="/change-email" method="get">
                                        @csrf
                                            <div class="form-group">
                                                <label class="form-label">Valid Email</label>
                                                <div class="input-group">
                                                        <input type="email" class="form-control" id="email" name="email" aria-describedby="inputGroupFileAddon01">
                                                
                                                </div>
                                            </div>
                                            <div class="col-12 offset-2">
                                            <button type="submit" class="btn btn-info waves-effect waves-light m-r-10 text-white">Submit</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                        <form class="form-materia form-horizontal" action="/update-password" method="get">
                                          @csrf
                                            <div class="form-group">
                                                <label class="col-md-12" for="password">Current Password</span>
                                                </label>
                                                <div class="col-md-12">
                                                    <input type="password" id="current_password" name="current_password" class="form-control" placeholder="Enter your current password" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12" for="bdate">New Password</span>
                                                </label>
                                                <div class="col-md-12">
                                                    <input type="password" id="new_password" name="new_password" class="form-control mydatepicker" placeholder="Enter your new password" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12" for="bdate">Confirm Password</span>
                                                </label>
                                                <div class="col-md-12">
                                                    <input type="password" id="confirm_password" name="confirm_password" class="form-control mydatepicker" placeholder="Confirm the new password" value="">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info waves-effect waves-light m-r-10 text-white">Submit Changes</button>
                                            
                                        </form>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                @foreach($get_users_info as $user)
                                    <div class="card-body">
                                        <h5 class="card-title font-weight-bold">Basic Information</h5>
                                        <form class="form-material form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-12" for="example-text">Name</span>
                                                </label>
                                                <div class="col-md-12">
                                                    <input type="text" id="example-text" name="" class="form-control" placeholder="" value="{{$user->name}}" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12" for="bdate">Email</span>
                                                </label>
                                                <div class="col-md-12">
                                                    <input type="text" id="" name="" class="form-control mydatepicker" placeholder="" value="{{$user->email}}" readonly>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- /.content -->
            
                <!-- Comment - table -->
            
                <!-- End Comment - chats -->
            
            
                <!-- End Page Content -->
            
            
                <!-- Right sidebar -->
            
                <!-- .right-sidebar -->
                @include('layouts.right-sidebar')
            
                <!-- End Right sidebar -->
            
            </div>
        
            <!-- End Container fluid  -->
        
        </div>
    
        <!-- End Page wrapper  -->
    
    
        <!-- footer -->
    
    @include('layouts.footer')
        <!-- End footer -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    @include('layouts.javascript')
    <script src="{{ asset('admin/dist/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript">
    // Date Picker
    jQuery('.mydatepicker').datepicker();
    </script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('admin/dist/js/pages/jasny-bootstrap.js')}}"></script>
    <!-- This Page JS -->
    <script src="{{ asset('admin/dist/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{ asset('admin/dist/js/pages/mask.init.js')}}"></script>
</body>
</html>