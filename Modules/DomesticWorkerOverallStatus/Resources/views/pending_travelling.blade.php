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
                                <div class="card-title">
                                <div class="row">
                                <div class="col-lg-2">
                                </div>
                                <div class="col-lg-2"></div>
                                <div class="col-lg-4 mb-2">
                                </div>
                                <div class=" col-lg-4">
                                <form action="/domesticworkeroverallstatus/search-pending-dw" method="get">
                                   @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="dw_contact" placeholder="Search worker Contact" aria-label="" aria-describedby="basic-addon1">
                                        <div class="input-group-append">
                                            <button class="btn btn-info text-white" type="submit">Search</button>
                                        </div>
                                    </div>
                                </form>
                                 </div>
                                </div>
                              </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Visa</th>
                                                <th>Workers Contact</th>
                                                <th>nok contact</th>
                                                <th>Company</th>
                                                <th>Employer Name</th>
                                                <th>Employer Contact</th>
                                                <th>Created At</th>
                                                <th>Option</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($get_all_pending_dw as $i =>$dw)
                                            <tr>
                                            @php
                                                if( $get_all_pending_dw->currentPage() == 1){
                                                    $i = $i+1;
                                                }else{
                                                    $i = ($i+1) + 10*($get_all_pending_dw->currentPage()-1);
                                                }
                                            @endphp
                                                <td>{{$i}}</td>
                                                <td hidden>{{$dw->id}}</td>
                                                <td>{{$dw->dw_last_name}} {{$dw->dw_first_name}} {{$dw->dw_other_name}}</td>
                                                <td><a style="width:50px; height:50px; color:blue;" href="{{asset('dw_employer_visa/'.$dw->visa)}}" target="_blank">View Visa</td>
                                                <td>{{$dw->dw_contact}}</td>
                                                <td>{{$dw->nok_contact}}</td>
                                                <td>{{$dw->name}}</td>
                                                <td>{{$dw->employer_name}}</td>
                                                <td>{{$dw->employer_contact}}</td>
                                                <td>{{$dw->created_at}}</td>
                                                <td><a href="/domesticworkeroverallstatus/mark-as-travelled/{{$dw->domestic_worker_id}}" class="btn btn-info btn-sm mb-1">Travelled</a>
                                                 <a href="/domesticworkeroverallstatus/mark-as-did-not-travel/{{$dw->domestic_worker_id}}" class="btn btn-primary btn-sm mb-1">Did not</a>
                                                 <a href="/domesticworkeroverallstatus/mark-as-returned/{{$dw->domestic_worker_id}}" class="btn btn-success btn-sm mb-1">Returned</a>
                                                 <a href="/domesticworkeroverallstatus/mark-as-renewed/{{$dw->domestic_worker_id}}" class="btn btn-danger btn-sm">Renewed</a>
                                                 </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                     <a href="/domesticworkeroverallstatus/print-workers-employer-info" class="btn btn-success">Print</a>
                                    </div>
                                    <div class="text-end ml-2">
                                        {{$get_all_pending_dw->links()}}
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