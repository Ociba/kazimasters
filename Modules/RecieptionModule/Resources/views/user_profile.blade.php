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
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- .content -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="user-bg"> <img width="100%" alt="user" src="{{ asset('admin/dist/images/big/img2.jpg')}}"> </div>
                            <div class="card-body">
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-6 border-end">
                                        <strong>Name</strong>
                                        <p>Jonathan Doe</p>
                                    </div>
                                    <div class="col-md-6"><strong>Occupation</strong>
                                        <p>Dentist</p>
                                    </div>
                                </div>
                                <hr>
                                <!-- /.row -->
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-6 border-end"><strong>Email ID</strong>
                                        <p>jondoe@gmail.com</p>
                                    </div>
                                    <div class="col-md-6"><strong>Phone</strong>
                                        <p>+123 456 789</p>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <hr>
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12"><strong>Address</strong>
                                        <p>E104, Dharti-2, Chandlodia Ahmedabad
                                            <br/> Gujarat, India.</p>
                                    </div>
                                </div>
                                <hr>
                                <br/>
                                <div class="row m-t-15">
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-purple"><i class="ti-facebook"></i></p>
                                        <h1>258</h1> </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-blue"><i class="ti-twitter"></i></p>
                                        <h1>125</h1> </div>
                                    <div class="col-md-4 col-sm-4 text-center">
                                        <p class="text-danger"><i class="ti-google"></i></p>
                                        <h1>140</h1> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">Activity</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">Biography</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">Update Details</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-body">
                                        <div class="profiletimeline">
                                            <div class="sl-item">
                                                <div class="sl-left"> <img src="{{ asset('admin/dist/images/users/13.jpg')}}" alt="user" class="img-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <p>assign a new task <a href="javascript:void(0)"> Design weblayout</a></p>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="http://eliteadmin.themedesigner.in/demos/bt4/assets/images/big/img1.jpg" class="img-responsive radius" /></div>
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="http://eliteadmin.themedesigner.in/demos/bt4/assets/images/big/img2.jpg" class="img-responsive radius" /></div>
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="http://eliteadmin.themedesigner.in/demos/bt4/assets/images/big/img3.jpg" class="img-responsive radius" /></div>
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img src="http://eliteadmin.themedesigner.in/demos/bt4/assets/images/big/img4.jpg" class="img-responsive radius" /></div>
                                                        </div>
                                                        <div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sl-item border-top">
                                                <div class="sl-left"> <img src="{{ asset('admin/dist/images/users/13.jpg')}}" alt="user" class="img-circle" /> </div>
                                                <div class="sl-right">
                                                    <div> <a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <div class="m-t-20 row">
                                                            <div class="col-md-3 col-xs-12"><img src="http://eliteadmin.themedesigner.in/demos/bt4/assets/images/big/img1.jpg" alt="user" class="img-responsive radius" /></div>
                                                            <div class="col-md-9 col-xs-12">
                                                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a href="javascript:void(0)" class="btn btn-success text-white"> Design weblayout</a></div>
                                                        </div>
                                                        <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sl-item border-top">
                                                <div class="sl-left"> <img src="{{ asset('admin/dist/images/users/13.jpg')}}" alt="user" class="img-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <p class="m-t-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                                    </div>
                                                    <div class="like-comm m-t-20"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                </div>
                                            </div>
                                            <div class="sl-item border-top">
                                                <div class="sl-left"> <img src="{{ asset('admin/dist/images/users/13.jpg')}}" alt="user" class="img-circle" /> </div>
                                                <div class="sl-right">
                                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                        <p class="m-t-10">
                                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 border-end"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">Johnathan Deo</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 border-end"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">(123) 456 7890</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 border-end"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">johnathan@admin.com</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                                <br>
                                                <p class="text-muted">London</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <p class="m-t-30">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                        <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                        <h4 class="card-title p-b-10 border-bottom">Skill Set</h4>
                                        <h5 class="m-t-30">Wordpress <span class="pull-right">80%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">HTML 5 <span class="pull-right">90%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">jQuery <span class="pull-right">50%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <h5 class="m-t-30">Photoshop <span class="pull-right">70%</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                        </div>
                                        <!-- Education -->
                                        <h4 class="card-title m-t-20 p-b-10 border-bottom">Education</h4>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">B.Tech from NIT</h6>
                                        </div>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">M.Tech from IIT</h6>
                                        </div>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">Ph.D from MIT</h6>
                                        </div>
                                        <!-- Experience -->
                                        <h4 class="card-title m-t-20 p-b-10 border-bottom">Experience</h4>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                                        </div>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">Excepteur sint occaecat cupidatat non proident.</h6>
                                        </div>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                                        </div>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">Excepteur sint occaecat cupidatat non proident.</h6>
                                        </div>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                                        </div>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">Excepteur sint occaecat cupidatat non proident.</h6>
                                        </div>
                                        <!-- Subjects -->
                                        <h4 class="card-title m-t-20 p-b-10 border-bottom">Subjects</h4>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                                        </div>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">Excepteur sint occaecat cupidatat non proident.</h6>
                                        </div>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                                        </div>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">Excepteur sint occaecat cupidatat non proident.</h6>
                                        </div>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h6>
                                        </div>
                                        <div class="d-flex no-block fa fa-check-circle text-success">
                                            <h6 class="m-l-10 text-dark">Excepteur sint occaecat cupidatat non proident.</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <h5 class="card-title">Basic Information</h5>
                                        <form class="form-material form-horizontal">
                                            <div class="form-group">
                                                <label class="col-md-12" for="example-text">Name</span>
                                                </label>
                                                <div class="col-md-12">
                                                    <input type="text" id="example-text" name="example-text" class="form-control" placeholder="enter your name" value="Jonathan Doe">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12" for="bdate">Date of Birth</span>
                                                </label>
                                                <div class="col-md-12">
                                                    <input type="text" id="bdate" name="bdate" class="form-control mydatepicker" placeholder="enter your birth date" value="12/10/2017">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Gender</label>
                                                <div class="col-sm-12">
                                                    <select class="form-select">
                                                        <option>Select Gender</option>
                                                        <option selected="selected">Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12">Profile Image</label>
                                                <div class="col-sm-12">
                                                    <img class="img-responsive" src="{{ asset('admin/dist/images/big/img2.jpg')}}" alt="" style="max-width:120px;">
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                        <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="..."> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-bs-dismiss="fileinput">Remove</a> </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-12" for="dept">Department</label>
                                                <div class="col-sm-12">
                                                    <select class="form-control" id="dept">
                                                        <option>Select Department</option>
                                                        <option selected="selected">Computer</option>
                                                        <option>Mechanical</option>
                                                        <option>Electrical</option>
                                                        <option>Medical</option>
                                                        <option>BCA/MCA</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12" for="position">Position</span>
                                                </label>
                                                <div class="col-md-12">
                                                    <input type="text" id="position" name="position" class="form-control" placeholder="e.g. Dentist" value="Assistant Professor">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Description</label>
                                                <div class="col-md-12">
                                                    <textarea class="form-control" rows="3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12" for="url">Website URL</span>
                                                </label>
                                                <div class="col-md-12">
                                                    <input type="text" id="url" name="url" class="form-control" placeholder="your website" value="http://www.example-website.com/">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info waves-effect waves-light m-r-10 text-white">Submit</button>
                                            <button type="submit" class="btn btn-dark waves-effect waves-light">Cancel</button>
                                        </form>
                                    </div>
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