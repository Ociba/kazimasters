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
                                  @foreach($get_order as $order)
                                  <strong>{{$order->name}}</strong><br>
                                  @endforeach
                                  Expected Amount: {{number_format($get_sum_of_expected_amount)}} /=<br>
                                  Actual Amount Paid: {{number_format($get_sum_of_actual_amount)}} /=
                                </div>
                                </div>
                              </div>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr style="text-transform: capitalize">
                                                    <th>#</th>
                                                    <th>Number of DW Required</th>
                                                    <th>Number of DW Taken</th>
                                                    <th>Total Amount</th>
                                                    <th>Amount Deposited</th>
                                                    <th>Balance</th>
                                                    <th class="text-center">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($get_order as $i=>$order)
                                                <tr>
                                                    <td>{{$i + 1}}</td>
                                                    <td hidden>{{$order->id}}</td>
                                                    <td>{{$order->number_of_dws_required}}</td>
                                                    <td>{{$order->number_of_dws_taken}}</td>
                                                    <td>{{number_format($order->total_amount)}} /=</td>
                                                    <td>{{ number_format($order->amount_deposited)}} /=</td>
                                                    <td>{{number_format($order->total_amount-$order->amount_deposited)}} /=</td>
                                                    <td>{{$order->created_at}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-lg-12 text-center">
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
