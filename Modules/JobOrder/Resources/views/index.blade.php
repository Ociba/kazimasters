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
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr style="text-transform: capitalize">
                                                    <th>#</th>
                                                    <th>NAME OF COMPANY</th>
                                                    <th>Created at</th>
                                                    <th>OPTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($get_companies as $i=>$company)
                                                <tr>
                                                @php
                                                    if( $get_companies->currentPage() == 1){
                                                        $i = $i+1;
                                                    }else{
                                                        $i = ($i+1) + 10*($get_companies->currentPage()-1);
                                                    }
                                                @endphp
                                                    <td>{{$i}}</td>
                                                    <td>{{$company->name}}</td>
                                                    <td>{{$company->created_at}}</td>
                                                    <td class="text-nowrap" style="width:10px">
                                                       <a href="/joborder/get-job-order-form/{{$company->id}}" class="btn btn-sm btn-info mb-1" data-bs-toggle="tooltip" data-original-title="Add New Order"> Add New Order</a>
                                                       <a href="/joborder/print-job-orders/{{$company->id}}" class="btn btn-sm btn-danger mb-1"> Print Order</a>
                                                        <a href="/joborder/company-job-orders/{{$company->id}}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-original-title="Job Orders"> View Job Orders</a>
                                                        
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
