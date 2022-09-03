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
                            <div class="card-body">
                            <div class="row">
                            <div class="col-lg-2"></div>
                           <div class="col-lg-8">
                                    <form class="mt-4" action="/joborder/save-job-order" method="get">
                                     @csrf
                                        <div class="row">
                                            <div class="form-group">
                                                <input type="hidden" name="abroadcompany_id" value="{{request()->route()->company_id}}">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="number_of_dws_required"
                                                        placeholder="">
                                                    <label for="number_of_dws_required">Number of DWs Required</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" name="number_of_dws_taken"
                                                        placeholder="">
                                                    <label for="number_of_dws_taken">Number of DWs Taken</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" name="total_amount"
                                                        placeholder="">
                                                    <label for="total_amount">Total Amount</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" name="amount_deposited"
                                                        placeholder="">
                                                    <label for="amount_deposited">Amount Deposited</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-md-fle align-items-center mt-3">
                                                    <div class="ms-aut mt-3 mt-md-0">
                                                        <a href="/joborder/company-job-orders/{{request()->route()->company_id}}" button type="button" class="btn btn-primary text-white">Back</button></a>
                                                        <button type="submit" class="btn btn-info text-white">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    </div>
                                    <div class="col-lg-2"></div></div>
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
    </body>
</html>
