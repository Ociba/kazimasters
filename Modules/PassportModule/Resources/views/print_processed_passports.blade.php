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
                        <form class="mt-2 m-3" action="/passportmodule/search-date-range-workers" method="get">
                            <div class="row">
                            <div class=" col-lg-5">
                                <div class="example mb-2">
                                    <div class="input-group">
                                    <label>From</label>
                                        &nbsp;<input type="date" class="form-control mydatepicker" name="from_date" placeholder="mm/dd/yyyy">
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-5">
                                <div class="example mb-2">
                                    <div class="input-group">
                                        <label>To</label>
                                        &nbsp;&nbsp; <input type="date" class="form-control mydatepicker" name="to_date" placeholder="mm/dd/yyyy">
                                    </div>
                                </div>
                            </div>
                            <div class=" col-lg-2">
                                <div class="example">
                                            <div class="input-group-append">
                                        <button class="btn btn-info btn-sm form-control text-white" type="submit"><i class="ti-search"></i> Search</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                            <div class="card-body printableArea">
                                <div class="card-title">
                                <div class="row">
                                <div class="col-lg-12 text-center">
                                @include('layouts.heading')
                                   <strong> Workers Whose Passport Are To Be Processed</strong>
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
                                                <th>Particulars</th>
                                                <th>Amount</th>
                                                <th>Remarks</th>
                                                <th>Parent</th>
                                                <th>Incharge</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($get_dw_with_passports_under_processing as $i=>$passport)
                                            <tr>
                                                <td>{{$i + 1}}</td>
                                                <td hidden>{{$passport->id}}</td>
                                                <td>{{$passport->dw_last_name}} {{$passport->dw_first_name}} {{$passport->dw_other_name}}</td>
                                                <td>{{$passport->dw_contact}}</td>
                                                <td>{{$passport->nationa_id_number}}</td>
                                                <td>{{$passport->particulars}}</td>
                                                <td>{{number_format($passport->amount)}}</td>
                                                <td>{{$passport->remarks}}</td>
                                                <td>{{$passport->parent_names}}</td>
                                                <td>{{$passport->name}}</td>
                                                <td>{{$passport->created_at}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-12 text-center">
                                    <button id="print" class="btn btn-success btn-outline mb-3" type="button"> <span><i class="ti-printer"></i> Print</span> </button>
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