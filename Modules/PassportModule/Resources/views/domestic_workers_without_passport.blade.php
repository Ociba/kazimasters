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
                                            <form action="/passportmodule/search-dw-info" method="get">
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="dw_contact" placeholder="Search DW By Contact" aria-label="" aria-describedby="basic-addon1">
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
                                                    <th>Dw Contact</th>
                                                    <th>Nok contact</th>
                                                    <th>Passport Status</th>
                                                    <th>Issuing Officer</th>
                                                    <th>Created At</th>
                                                    <th class="text-nowrap">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($with_out_passport as $i=>$item)
                                                <tr>
                                                @php
                                                    if( $with_out_passport->currentPage() == 1){
                                                        $i = $i+1;
                                                    }else{
                                                        $i = ($i+1) + 10*($with_out_passport->currentPage()-1);
                                                    }
                                                @endphp
                                                    <td>{{$i}}</td>
                                                    <td hidden>{{$item->id}}</td>
                                                    <td>{{$item->dw_last_name}} {{$item->dw_first_name}} {{$item->dw_other_name}}</td>
                                                    <td>{{$item->dw_contact}}</td>
                                                    <td>{{$item->nok_contact}}</td>
                                                    <td>{{$item->passport_status}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->created_at}}</td>
                                                    <td class="text-nowrap" style="width:10px">
                                                        <a href="/passportmodule/fully-register-domestic-worker/{{$item->domestic_worker_at_recieptions_id}}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-original-title="Close"> Add Passport</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="text-end ml-2">
                                                {{$with_out_passport->links()}}
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
