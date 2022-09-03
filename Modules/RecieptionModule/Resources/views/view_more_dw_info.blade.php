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
                      @foreach($view_more_domestic_worker_info as $more_info)
                                <!-- Column -->
                                <div class="col-lg-12 col-xlg-9 col-md-12">
                                    <div class="card">
                                        <div class="card-body printableArea text-center">
                                            <div class="card-title">
                                                <div class="row">
                                                    <div class="col-lg-12 text-center">
                                                    @include('layouts.heading')
                                                    <strong> Worker Information at Reception</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{--<span class="text-center"><img style="width:90px; height:60px;" src="{{ asset('dw_photo/'.$more_info->photo)}}"></span>--}}
                                                    <div class="table-responsive m-t-40" style="clear: both;">
                                                        <table class="table table-borderless">
                                                            <thead>
                                                                <tr>
                                                                    <th>Names</th>
                                                                    <th class="text-end">Gender</th>
                                                                    <th class="text-end">Workers Contact</th>
                                                                    <th class="text-end">Workers Location</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{$more_info->dw_last_name}} {{$more_info->dw_first_name}} {{$more_info->dw_other_name}}</td>
                                                                    <td class="text-end">{{$more_info->gender}} </td>
                                                                    <td class="text-end"> {{$more_info->dw_contact}} </td>
                                                                    <td class="text-end"> {{$more_info->dw_location}} </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Next of Kin</th>
                                                                    <th class="text-end"> NOk Contact </th>
                                                                    <th class="text-end"> Passport Number </th>
                                                                    <th class="text-end"> Reason </th>
                                                                </tr>
                                                                <tr>
                                                                    <td> {{$more_info->next_of_kin}}</a></td>
                                                                    <td class="text-end">{{$more_info->nok_contact}} </td>
                                                                    <td class="text-end">{{$more_info->passport_number	}}</td>
                                                                    <td class="text-end">{{$more_info->reason_for_coming}} </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Agents Name</th>
                                                                    <th class="text-end">Agents Other Name</th>
                                                                    <th class="text-end"> Agent Nin </th>
                                                                    <th class="text-end"> Phone Number </th>
                                                                </tr>
                                                                <tr>
                                                                    <td> {{$more_info->last_name}} {{$more_info->first_name}}</a></td>
                                                                    <td class="text-end">{{$more_info->other_names}}  </td>
                                                                    <td class="text-end">{{$more_info->agent_nin}} </td>
                                                                    <td class="text-end">{{$more_info->phone_number	}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-12 text-center">
                                                <button id="print" class="btn btn-success btn-outline mb-3" type="button"> <span><i class="fa fa-print"></i>click Here To Print</span> </button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
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