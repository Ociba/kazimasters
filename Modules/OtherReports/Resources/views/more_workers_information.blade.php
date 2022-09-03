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
                            <div class="row">
                                    <div class="col-md-12">
                                        @foreach($get_all_cleared_dw as $worker)
                                        <div class="card-body printableArea text-center">
                                            <div class="card-title">
                                                <div class="row">
                                                    <div class="col-lg-12 text-center">
                                                    @include('layouts.heading')
                                                    <strong> Workers With Other Documents Information</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive m-t-40" style="clear: both;">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Names</th>
                                                                    <th class="text-end">Gender</th>
                                                                    <th class="text-end">Next of Kin Contact</th>
                                                                    <th class="text-end">Passport Payment</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>{{$worker->dw_last_name}} {{$worker->dw_first_name}} {{$worker->dw_other_name}}</td>
                                                                    <td class="text-end">{{$worker->dw_contact}} </td>
                                                                    <td class="text-end"> {{$worker->nok_contact}} </td>
                                                                    <td class="text-end"> <a href="{{ asset('dw_vcs_passport_payment/'.$worker->vcs_passport_payment)}}" style="color:blue;" target="_blank">View Passport payment</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Gcc Payment</th>
                                                                    <th class="text-end"> Visa Payment </th>
                                                                    <th class="text-end"> Ticket Copy </th>
                                                                    <th class="text-end"> Passport Copy </th>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="{{ asset('dw_gcc_payment/'.$worker->gcc_payment)}}" style="color:blue;" target="_blank">View Gcc Payment</a></td>
                                                                    <td class="text-end"><a href="{{ asset('dw_visa_attachment/'.$worker->visa_attachment)}}" style="color:blue;" target="_blank">View Visa Attachment</a> </td>
                                                                    <td class="text-end"><a href="{{ asset('dw_ticket_copy/'.$worker->ticket_copy)}}" style="color:blue;" target="_blank">View ticket Copy</a> </td>
                                                                    <td class="text-end"><a href="{{ asset('dw_passport_copy/'.$worker->passport_copy)}}" style="color:blue;" target="_blank">View Passport Copy</a> </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Pcr Test Results</th>
                                                                    <th class="text-end"> Min Clearaance Letter </th>
                                                                    <th class="text-end"> Yellow Fever </th>
                                                                    <th class="text-end"> Covid </th>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="{{ asset('dw_dw_pcr_test_result/'.$worker->pcr_test_result)}}" style="color:blue;" target="_blank">View Pcr Results</a></td>
                                                                    <td class="text-end"> <a href="{{ asset('dw_ministry_clearance_letter/'.$worker->ministry_clearance_letter)}}" style="color:blue;" target="_blank">View Min. Clearance Letter</a> </td>
                                                                    <td class="text-end"><a href="{{ asset('dw_yellow_book/'.$worker->yellow_book)}}" style="color:blue;" target="_blank">View Yellow Fever</a></td>
                                                                    <td class="text-end"><a href="{{ asset('dw_covid/'.$worker->covid)}}" style="color:blue;" target="_blank">View Covid Certificate</a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Departure Premedical</th>
                                                                    <th class="text-end"> Training Certificate </th>
                                                                    <th class="text-end"> Created On </th>
                                                                    <th class="text-end"> Created By </th>
                                                                </tr>
                                                                <tr>
                                                                    <td><a href="{{ asset('dw_departure_medical/'.$worker->departure_medical)}}" style="color:blue;" target="_blank">View Departure Medical</a></td>
                                                                    <td class="text-end"><a href="{{ asset('dw_training_certificate/'.$worker->training_certificate)}}" style="color:blue;" targe="_blank">view Training Certificate</td>
                                                                    <td class="text-end"> {{$worker->created_at}} </td>
                                                                    <td class="text-end"> {{$worker->name}} </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="text-center mb-1">
                                            <button id="print" class="btn btn-success btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                                        </div>
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