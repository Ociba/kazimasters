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
                <!-- .cards -->
                @include('layouts.cards')
                <!-- /.cards -->
                <!-- .content -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <h5 class="card-title text-uppercase">University Earnings<br><small class="text-muted">All Earnings are in million $</small></h5>
                                    <div class="ms-auto">
                                        <ul class="list-inline font-12">
                                            <li><i class="fa fa-circle text-dark"></i> Arts</li>
                                            <li><i class="fa fa-circle text-info"></i> Commerse</li>
                                            <li><i class="fa fa-circle text-success"></i> Science</li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="morris-bar-chart" style="height:375px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card m-b-15">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Earning From Medical college</h5>
                                        <div class="row">
                                            <div class="col-6 m-t-30">
                                                <h1 class="text-info">$64057</h1>
                                                <p class="text-muted">APRIL 2017</p> <b>(150 Sales)</b> </div>
                                            <div class="col-6">
                                                <div id="sparkline2dash" class="text-end"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card bg-info m-b-15">
                                    <div class="card-body">
                                        <h5 class="text-white card-title text-uppercase">Earning From Engineering college</h5>
                                        <div class="row">
                                            <div class="col-6 m-t-30">
                                                <h1 class="text-white">$30447</h1>
                                                <p class="text-white">APRIL 2017</p> <b class="text-white">(110 Sales)</b> </div>
                                            <div class="col-md-6 col-sm-6 col-6">
                                                <div id="sales1" class="text-end"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.content -->
               
                <!-- Comment - table -->
               
                <!-- row -->
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <img class="img-responsive" alt="user" src="{{asset('admin/dist/images/big/c2.jpg')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Web Designing</h5>
                                <div class="m-b-30">
                                    <a class="link list-icons" href="#">
                                        <i class="ti-alarm-clock"></i> 2 Year
                                    </a>
                                    <a class="link list-icons m-l-10 m-r-10" href="#">
                                        <i class="fa fa-heart-o"></i> 38
                                    </a>
                                    <a class="link list-icons m-l-10 m-r-10" href="#">
                                        <i class="fa fa-usd"></i> 50
                                    </a>
                                </div>
                                <p>
                                    <span><i class="ti-alarm-clock"></i> Duration: 6 Months</span>
                                </p>
                                <p>
                                    <span><i class="ti-user"></i> Professor: Jane Doe</span>
                                </p>
                                <p>
                                    <span><i class="fa fa-graduation-cap"></i> Students: 200+</span></span>
                                </p>
                                <button class="btn btn-success text-white btn-rounded waves-effect waves-light m-t-10">More Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <img class="img-responsive" alt="user" src="{{asset('admin/dist/images/big/c1.jpg')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ios Development</h5>
                                <div class="m-b-30">
                                    <a class="link list-icons" href="#">
                                        <i class="ti-alarm-clock"></i> 2 Year
                                    </a>
                                    <a class="link list-icons m-l-10 m-r-10" href="#">
                                        <i class="fa fa-heart-o"></i> 38
                                    </a>
                                    <a class="link list-icons m-l-10 m-r-10" href="#">
                                        <i class="fa fa-usd"></i> 50
                                    </a>
                                </div>
                                <p>
                                    <span><i class="ti-alarm-clock"></i> Duration: 6 Months</span>
                                </p>
                                <p>
                                    <span><i class="ti-user"></i> Professor: Jane Doe</span>
                                </p>
                                <p>
                                    <span><i class="fa fa-graduation-cap"></i> Students: 200+</span></span>
                                </p>
                                <button class="btn btn-success text-white btn-rounded waves-effect waves-light m-t-10">More Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <img class="img-responsive" alt="user" src="{{asset('admin/dist/images/big/c4.jpg')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Android Development</h5>
                                <div class="m-b-30">
                                    <a class="link list-icons" href="#">
                                        <i class="ti-alarm-clock"></i> 2 Year
                                    </a>
                                    <a class="link list-icons m-l-10 m-r-10" href="#">
                                        <i class="fa fa-heart-o"></i> 38
                                    </a>
                                    <a class="link list-icons m-l-10 m-r-10" href="#">
                                        <i class="fa fa-usd"></i> 50
                                    </a>
                                </div>
                                <p>
                                    <span><i class="ti-alarm-clock"></i> Duration: 6 Months</span>
                                </p>
                                <p>
                                    <span><i class="ti-user"></i> Professor: Jane Doe</span>
                                </p>
                                <p>
                                    <span><i class="fa fa-graduation-cap"></i> Students: 200+</span></span>
                                </p>
                                <button class="btn btn-success text-white btn-rounded waves-effect waves-light m-t-10">More Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <img class="img-responsive" alt="user" src="{{ asset('admin/dist/images/big/c3.jpg')}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Web Development</h5>
                                <div class="m-b-30">
                                    <a class="link list-icons" href="#">
                                        <i class="ti-alarm-clock"></i> 2 Year
                                    </a>
                                    <a class="link list-icons m-l-10 m-r-10" href="#">
                                        <i class="fa fa-heart-o"></i> 38
                                    </a>
                                    <a class="link list-icons m-l-10 m-r-10" href="#">
                                        <i class="fa fa-usd"></i> 50
                                    </a>
                                </div>
                                <p>
                                    <span><i class="ti-alarm-clock"></i> Duration: 6 Months</span>
                                </p>
                                <p>
                                    <span><i class="ti-user"></i> Professor: Jane Doe</span>
                                </p>
                                <p>
                                    <span><i class="fa fa-graduation-cap"></i> Students: 200+</span></span>
                                </p>
                                <button class="btn btn-success text-white btn-rounded waves-effect waves-light m-t-10">More Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
               
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
</body>
</html>