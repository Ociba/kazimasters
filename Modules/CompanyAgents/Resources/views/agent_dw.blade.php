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
                                <div class="card-body printableArea">
                                <div class="card-title">
                                    <div class="row">
                                    <div class="col-lg-12 text-center">
                                    @include('layouts.heading')<br>
                                    <strong>Company Agent & Workers</strong><br>
                                    @foreach($get_dw_for_this_agent as $i =>$dw)
                                    <span>{{$dw->last_name}} {{$dw->first_name}} {{$dw->other_names}}</span><br>
                                        {{$dw->phone_number}}<br>
                                    @endforeach
                                    <span style="color:blue;">Number of Workers Brought : 
                                       {{$total_number_dw_for_this_agent}}
                                    </span>
                                    </div>
                                    </div>
                              </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr style="text-transform: uppercase">
                                                <th>#</th>
                                                <th>NAME</th>
                                                <th>workers contact</th>
                                                <th>nok contact</th>
                                                <th>Workers Location</th>
                                                <th>Nok</th>
                                                <th>Registered by</th>
                                                <th class="text-center">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($get_dw_for_this_agent as $i =>$dw)
                                            <tr>
                                            @php
                                                if( $get_dw_for_this_agent->currentPage() == 1){
                                                    $i = $i+1;
                                                }else{
                                                    $i = ($i+1) + 10*($get_dw_for_this_agent->currentPage()-1);
                                                }
                                            @endphp
                                                <td>{{$i}}</td>
                                                <td hidden>{{$dw->id}}</td>
                                                <td>{{$dw->dw_last_name}} {{$dw->dw_first_name}} {{$dw->dw_other_name}}</td>
                                                <td>{{$dw->dw_contact}}</td>
                                                <td>{{$dw->nok_contact}}</td>
                                                <td>{{$dw->dw_location}}</td>
                                                <td>{{$dw->next_of_kin}}</td>
                                                <td>{{$dw->name}}</td>
                                                <td>{{$dw->created_at}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row m-2">
                                    <div class="col-lg-4">
                                        {{$get_dw_for_this_agent->links()}}
                                    </div>
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-4 text-end ml-2">
                                        <button id="print" class="btn btn-success btn-outline mb-3" type="button"> <span><i class="fa fa-print"></i>click Here To Print</span> </button>
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