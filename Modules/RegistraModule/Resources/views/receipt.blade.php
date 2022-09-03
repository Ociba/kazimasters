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
<style>
    .table-borderless td,
    .table-borderless th {
        border: 0;
    }
</style>
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
                                        @foreach($print_dw_info as $worker)
                                        <div class="card-body printableArea">
                                            <div class="card-title">
                                                <div class="row">
                                                    <div class="col-lg-12 text-center">
                                                    @include('layouts.heading')
                                                    <strong> Receipt</strong>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="table-responsive m-t-40" style="clear: both;">
                                                        <table class="table table-borderless">
                                                            <thead>
                                                               
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>Number: <span style="color:red;">00{{$worker->domestic_worker_at_recieptions_id}}</span></td>
                                                                    <td class="text-end">Date: {{$worker->created_at}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Receeived from: <span style="font-weight:bold;">{{$worker->dw_last_name}} {{$worker->dw_first_name}} {{$worker->dw_other_name}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>The sum of: <span style="font-weight:bold;">{{$worker->amount_in_words}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Being Payment of: <span style="font-weight:bold;">{{$worker->reason_for_payment}}</span></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Amount: <input type="text" value="shs. {{number_format($worker->office_or_premedical_fee)}}"><br><span style="margin-left:100px; font-style:italic;">With Thanks</span<</td>
                                                                    <td class="text-end">Stamp & Sign: .....................<br><span style="font-weight:bold;">Registered By:</span> {{auth()->user()->name}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="">
                                                            <div class="col-md-12 text-center">
                                                            <span style="font-weight:bold;">Note::</span> This Receipt is valid with an Official stamp of @include('layouts.reciept')
                                                            </div>
                                                        </div>
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