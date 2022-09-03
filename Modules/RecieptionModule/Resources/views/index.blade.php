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
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white">2,064</h1>
                                <h6 class="text-white">Sessions</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card">
                            <div class="box bg-primary text-center">
                                <h1 class="font-light text-white">1,738</h1>
                                <h6 class="text-white">Users</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white">5963</h1>
                                <h6 class="text-white">Page Views</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card">
                            <div class="box bg-dark text-center">
                                <h1 class="font-light text-white">2.9s</h1>
                                <h6 class="text-white">Pages/Session</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card">
                            <div class="box bg-megna text-center">
                                <h1 class="font-light text-white">1.5s</h1>
                                <h6 class="text-white">Avg. Session</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-4 col-xlg-2">
                        <div class="card">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white">10%</h1>
                                <h6 class="text-white">Bounce Rate</h6>
                            </div>
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
                                            <p class="text-white">25th Jan</p>
                                            <h3 class="text-white font-light">Now Get <span class="font-bold">50% Off</span><br>
                                      on buy</h3>
                                            <div class="text-white m-t-20">
                                                <i>- john doe</i>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="fab fa-twitter fa-2x text-white"></i>
                                            <p class="text-white">25th Jan</p>
                                            <h3 class="text-white font-light">Now Get <span class="font-bold">50% Off</span><br>
                                      on buy</h3>
                                            <div class="text-white m-t-20">
                                                <i>- john doe</i>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="fab fa-twitter fa-2x text-white"></i>
                                            <p class="text-white">25th Jan</p>
                                            <h3 class="text-white font-light">Now Get <span class="font-bold">50% Off</span><br>
                                      on buy</h3>
                                            <div class="text-white m-t-20">
                                                <i>- john doe</i>
                                            </div>
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
                                            <p class="text-white">25th Jan</p>
                                            <h3 class="text-white">Now Get <span class="font-bold">50% Off</span><br>
                                      on buy</h3>
                                            <div class="text-white m-t-20">
                                                <i>- john doe</i>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="fab fa-facebook-f fa-2x text-white"></i>
                                            <p class="text-white">25th Jan</p>
                                            <h3 class="text-white">Now Get <span class="font-bold">50% Off</span><br>
                                      on buy</h3>
                                            <div class="text-white m-t-20">
                                                <i>- john doe</i>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column"> <i class="fab fa-facebook-f fa-2x text-white"></i>
                                            <p class="text-white">25th Jan</p>
                                            <h3 class="text-white">Now Get <span class="font-bold">50% Off</span><br>
                                      on buy</h3>
                                            <div class="text-white m-t-20">
                                                <i>- john doe</i>
                                            </div>
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
                                            <p class="text-white">25th Jan</p>
                                            <h3 class="text-white">Now Get <span class="font-bold">50% Off</span><br>
                                      on buy</h3>
                                            <div>
                                                <button class="btn btn-secondary b-0 waves-effect waves-light m-t-15">Default</button>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="fa fa-map-marker fa-2x text-white"></i>
                                            <p class="text-white">25th Jan</p>
                                            <h3 class="text-white">Now Get <span class="font-bold">50% Off</span><br>
                                      on buy</h3>
                                            <div>
                                                <button class="btn btn-secondary b-0 waves-effect waves-light m-t-15">Default</button>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="fa fa-map-marker fa-2x text-white"></i>
                                            <p class="text-white">25th Jan</p>
                                            <h3 class="text-white">Now Get <span class="font-bold">50% Off</span><br>
                                      on buy</h3>
                                            <div>
                                                <button class="btn btn-secondary b-0 waves-effect waves-light m-t-15">Default</button>
                                            </div>
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
                                            <p>25th Jan</p>
                                            <h3>Now Get <span class="font-bold">50% Off</span><br>on buy</h3>
                                            <div>
                                                <button class="btn btn-info justify-content-start waves-effect waves-light m-t-15 text-white">Default</button>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column">
                                            <i class="fa fa-map-marker fa-2x"></i>
                                            <p>25th Jan</p>
                                            <h3>Now Get <span class="font-bold">50% Off</span><br>
                                      on buy</h3>
                                            <div>
                                                <button class="btn btn-success d-inline waves-effect waves-light m-t-15 text-white">Default</button>
                                            </div>
                                        </div>
                                        <div class="carousel-item flex-column"> <i class="fa fa-map-marker fa-2x"></i>
                                            <p>25th Jan</p>
                                            <h3>Now Get <span class="font-bold">50% Off</span><br>
                                      on buy</h3>
                                            <div>
                                                <button class="btn btn-primary waves-effect waves-light m-t-15">Default</button>
                                            </div>
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