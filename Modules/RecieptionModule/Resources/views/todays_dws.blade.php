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
                            <div class="card-body">
                                {{--<div class="card-title">
                                <div class="row">
                                <div class="col-lg-2">
                                <div class="form-group">
                                    <select class="form-control form-select" data-placeholder="" tabindex="1">
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-4 mb-2">
                                </div>
                                <div class=" col-lg-4">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                        <div class="input-group-append">
                                            <button class="btn btn-info text-white" type="button">Search</button>
                                        </div>
                                    </div>
                                 </div>
                                </div>
                                </div>
                                --}}
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Reason</th>
                                                <th>Created At</th>
                                                <th>Created By</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($get_todays_worker as $i=>$registered_today)
                                            <tr>
                                            @php
                                                if( $get_todays_worker->currentPage() == 1){
                                                    $i = $i+1;
                                                }else{
                                                    $i = ($i+1) + 10*($get_todays_worker->currentPage()-1);
                                                }
                                            @endphp
                                                <td>{{$i}}</td>
                                                <td>{{$registered_today->dw_last_name}} {{$registered_today->dw_other_name}} {{$registered_today->dw_first_name}}</td>
                                                <td>{{$registered_today->reason_for_coming}}</td>
                                                <td>{{$registered_today->created_at}}</td>
                                                <td>{{$registered_today->name}}</td>
                                                <td><a href="/recieptionmodule/view-more-dw-info/{{$registered_today->id}}" class="btn btn-info btn-sm">View More</a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="text-end ml-2">
                                        {{$get_todays_worker->links()}}
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
</body>
</html>