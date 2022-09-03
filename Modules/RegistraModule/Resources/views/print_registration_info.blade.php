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
                    <div class="card">
                            <div class="card-body printableArea">
                                <div class="card-title">
                                <div class="row">
                                <div class="col-lg-12 text-center">
                                @include('layouts.heading')
                                   <strong> Workers Registration Information</strong>
                                </div>
                                </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Contact</th>
                                                <th>NIN</th>
                                                <th>Education</th>
                                                <th>Skills</th>
                                                <th>Job</th>
                                                <th>Parent</th>
                                                <th>Fee</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($get_todays_registra_dw as $i=>$registered_dw)
                                            <tr>
                                                <td>{{$i + 1}}</td>
                                                <td hidden>{{$registered_dw->id}}</td>
                                                <td>{{$registered_dw->dw_last_name}} {{$registered_dw->dw_first_name}} {{$registered_dw->dw_other_name}}</td>
                                                <td>{{$registered_dw->dw_contact}}</td>
                                                <td>{{$registered_dw->nationa_id_number}}</td>
                                                <td>{{$registered_dw->education_level}}</td>
                                                <td>{{$registered_dw->other_skills	}}</td>
                                                <td>{{$registered_dw->desired_job}}</td>
                                                <td>{{$registered_dw->parent_names}}</td>
                                                <td>{{ number_format($registered_dw->office_or_premedical_fee)}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12 text-center">
                                    Printed By {{auth()->user()->name}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-12 text-center">
                                    <button id="print" class="btn btn-success btn-outline mb-3" type="button"> <span><i class="fa fa-print"></i>Print</span> </button>
                                    </div>
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
    <script src="{{ asset('admin/dist/js/pages/jquery.PrintArea.js')}}" type="text/JavaScript"></script>
    <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>
</body>
</html>