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
                <!-- .content -->
                <div class="row">
                    <div class="col-lg-12">
                    @include('layouts.messages')
                    <div class="card">
                      @foreach($get_more_dw_info as $more_info)
                            <div class="card-body">
                                <!-- Column -->
                                <div class="col-lg-12 col-xlg-9 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3 col-xs-6 border-end"> <strong>First Name</strong>
                                                    <br>
                                                    <p class="text-muted">{{$more_info->dw_first_name}}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6 border-end"> <strong>Other Names</strong>
                                                    <br>
                                                    <p class="text-muted">{{$more_info->dw_other_name}}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6 border-end"> <strong>Last Name</strong>
                                                    <br>
                                                    <p class="text-muted">{{$more_info->dw_last_name}}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6"> <strong>National ID</strong>
                                                    <br>
                                                    <p class="text-muted">{{$more_info->nationa_id_number}}</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3 col-xs-6 border-end"> <strong>Education Level</strong>
                                                    <br>
                                                    <p class="text-muted">{{$more_info->education_level	}}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6 border-end"> <strong>Other Skills</strong>
                                                    <br>
                                                    <p class="text-muted">{{$more_info->other_skills}}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6 border-end"> <strong>Dw Contact</strong>
                                                    <br>
                                                    <p class="text-muted">{{$more_info->dw_contact}}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6 border-end"> <strong>Premedical Fee</strong>
                                                    <br>
                                                    <p class="text-muted">{{ number_format($more_info->office_or_premedical_fee)}} /=</p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-3 col-xs-6 border-end"> <strong>DW Contact</strong>
                                                    <br>
                                                    <p class="text-muted">{{$more_info->dw_contact}}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6 border-end"> <strong>Desired Job</strong>
                                                    <br>
                                                    <p class="text-muted">{{$more_info->desired_job}}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6 border-end"> <strong>Parents Name</strong>
                                                    <br>
                                                    <p class="text-muted">{{$more_info->parent_names}}</p>
                                                </div>
                                                <div class="col-md-3 col-xs-6 border-end"> <strong>Premedical Status</strong>
                                                    <br>
                                                    <p class="text-muted">{{$more_info->premedical_status	}}</p>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
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
</body>
</html>