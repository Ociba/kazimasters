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
<link rel="stylesheet" type="text/css"
        href="{{ asset('admin/dist/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/dist/css/responsive.dataTables.min.css')}}">
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
                            <div class="card-body">
                            <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card">
                        <a href="/recieptionmodule/all-domestic-workers">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">{{$count_all_dw}}</h1>
                                <h6 class="text-white">Total Number of Workers Registered</h6>
                            </div>
                        </div>
                        </a>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card">
                            <a href="/recieptionmodule/new-domestic-workers">
                                <div class="box bg-primary text-center">
                                    <h1 class="font-light text-white">{{$count_all_dw_registered_today}}</h1>
                                    <h6 class="text-white">Total Number of Workers Registered Today</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card">
                            <a href="/registered-users">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white">{{$count_all_users}}</h1>
                                <h6 class="text-white">Total Number Of Users</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-2">
                        <div class="card">
                            <a href="/companyagents/company-agents">
                            <div class="box bg-dark text-center">
                                <h1 class="font-light text-white">{{$count_company_agents}}</h1>
                                <h6 class="text-white">Total Number Of Registered Company Agents</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-2">
                        <div class="card">
                            <a href="/registramodule/new-domestic-workers">
                            <div class="box bg-megna text-center">
                                <h1 class="font-light text-white">{{number_format($get_total_amount_today)}} /=</h1>
                                <h6 class="text-white">Registration Fee Today</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-2">
                        <div class="card">
                            <a href="/registramodule/new-domestic-workers">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white">{{ number_format($get_total_amount)}} /=</h1>
                                <h6 class="text-white">Cumulative Registration Fee</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                     <!-- Column -->
                     <div class="col-md-6 col-lg-3 col-xlg-2">
                        <div class="card">
                           <a href="/registramodule/new-domestic-workers">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">{{auth()->user()->countPassports()}}</h1>
                                <h6 class="text-white">Number of Passports Registered For Workers</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                      <!-- Column -->
                      <div class="col-md-6 col-lg-3 col-xlg-2">
                        <div class="card">
                           <a href="/domesticworkeroverallstatus/companies">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white">{{auth()->user()->countDwsTravelled()}}</h1>
                                <h6 class="text-white">Workers Travelled</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-2">
                        <div class="card">
                        <a href="/domesticworkeroverallstatus/did-not-travel">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white">{{auth()->user()->countDwsWhoDidNotTravel()}}</h1>
                                <h6 class="text-white">Workers Who Did Not Travel</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                     <!-- Column -->
                     <div class="col-md-6 col-lg-3 col-xlg-2">
                        <div class="card">
                           <a href="/domesticworkeroverallstatus/returned">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white">{{auth()->user()->countDwReturned()}}</h1>
                                <h6 class="text-white">Workers Who Returned</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                      <!-- Column -->
                      <div class="col-md-6 col-lg-3 col-xlg-2">
                        <div class="card">
                           <a href="/domesticworkeroverallstatus/renewed">
                            <div class="box bg-dark text-center">
                                <h1 class="font-light text-white">{{auth()->user()->countDwRenewedContract()}}</h1>
                                <h6 class="text-white">Workers Who Renewed Contract</h6>
                            </div>
                            </a>
                        </div>
                    </div>
                           </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="row">
                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-info">
                            <div class="card-body">
                                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active flex-column">
                                            <i class="fab fa-twitter fa-2x text-white"></i>
                                            <p class="text-white">Today</p>
                                            <h3 class="text-white font-light">Registration Fee<span class="font-bold"> {{number_format($get_total_amount_today)}} /=</span><br>
                                            </h3>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="fab fa-twitter fa-2x text-white"></i>
                                            <p class="text-white">This Week</p>
                                            <h3 class="text-white font-light">Registration Fee<span class="font-bold"> {{number_format($get_total_amount_this_week)}} /=</span><br>
                                            </h3>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="fab fa-twitter fa-2x text-white"></i>
                                            <p class="text-white">This Month</p>
                                            <h3 class="text-white font-light">Registration Fee<span class="font-bold"> {{ number_format($get_total_amount_this_month)}} /=</span><br>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-primary">
                            <div class="card-body">
                                <div id="myCarousel2" class="carousel slide vert" data-bs-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active flex-column">
                                            <i class="fab fa-facebook-f fa-2x text-white"></i>
                                            <p class="text-white">This Year</p>
                                            <h3 class="text-white">Registration Fee <span class="font-bold">{{ number_format($get_total_amount_this_year)}} /= /=</span><br>
                                            </h3>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="fab fa-facebook-f fa-2x text-white"></i>
                                            <p class="text-white">Today</p>
                                            <h3 class="text-white">Registration Fee <span class="font-bold">{{number_format($get_total_amount_today)}} /=</span><br>
                                            </h3>
                                        </div>
                                        <div class="carousel-item flex-column"> <i class="fab fa-facebook-f fa-2x text-white"></i>
                                            <p class="text-white">This Week</p>
                                            <h3 class="text-white">Registration Fee <span class="font-bold">{{number_format($get_total_amount_this_week)}} /=</span><br>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-inverse">
                            <div class="card-body">
                                <div id="myCarousel3" class="carousel slide" data-bs-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active flex-column">
                                            <i class="fa fa-map-marker fa-2x text-white"></i>
                                            <p class="text-white">This Month</p>
                                            <h3 class="text-white">Registration Fee <span class="font-bold">{{ number_format($get_total_amount_this_month)}} /=</span><br>
                                            </h3>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="fa fa-map-marker fa-2x text-white"></i>
                                            <p class="text-white">This Year</p>
                                            <h3 class="text-white">Registration Fee <span class="font-bold">{{ number_format($get_total_amount_this_year)}} /=</span><br>
                                           </h3>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="fa fa-map-marker fa-2x text-white"></i>
                                            <p class="text-white">Today</p>
                                            <h3 class="text-white">Registration Fee<span class="font-bold">{{number_format($get_total_amount_today)}} /=</span><br>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-white">
                            <div class="card-body">
                                <div id="myCarousel4" class="carousel vert slide" data-bs-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active flex-column">
                                            <i class="fa fa-map-marker fa-2x"></i>
                                            <p>This Week</p>
                                            <h3>Registration Fee <span class="font-bold">{{number_format($get_total_amount_this_week)}} /=</span><br></h3>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="fa fa-map-marker fa-2x"></i>
                                            <p>This Month</p>
                                            <h3>Registration Fee <span class="font-bold">{{ number_format($get_total_amount_this_month)}} /=</span><br>
                                            </h3>
                                        </div>
                                        <div class="carousel-item flex-column"> <i class="fa fa-map-marker fa-2x"></i>
                                            <p>This Year</p>
                                            <h3>Registration Fee <span class="font-bold">{{ number_format($get_total_amount_this_year)}} /=</span><br>
                                           </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col -->
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
    <!-- This is data table -->
    <script src="{{ asset('admin/dist/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin/dist/js/dataTables.responsive.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <script src="{{ asset('admin/dist/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('admin/dist/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('admin/dist/js/jszip.min.js')}}"></script>
    <script src="{{ asset('admin/dist/js/pdfmake.min.js')}}"></script>
    <script src="{{ asset('admin/dist/js/vfs_fonts.js')}}"></script>
    <script src="{{ asset('admin/dist/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('admin/dist/js/buttons.print.min.js')}}"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(function () {
            $('#myTable').DataTable();
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function (settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function (group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            // responsive table
            $('#config-table').DataTable({
                responsive: true
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary me-1');
        });

    </script>
    <div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Enter Domestic Worker Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form class="mt-4">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="tb-email"
                                placeholder="name@example.com">
                            <label for="tb-email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control" rows="5" id="tb-email"
                                placeholder="Enter the Reason"></textarea>
                            <label for="tb-email">Enter Reason</label>
                        </div>
                        <div class="text-center">
                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</body>
</html>