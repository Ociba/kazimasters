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
                                     <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                            @foreach ($dw_info as $item)
                                            <form class="mt-4" action="/premedicalmodule/update-dw-at-premedical/{{$item->id}}" method="get">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-lg-12">
                                                    <input type="hidden" name="domestic_worker_at_registra_id" value="{{request()->route()->dw_id}}">
                                                    <input type="hidden" name="issuing_officer" value="{{auth()->user()->id}}">
                                                    <div class="form-group mb-3">
                                                    <label for="premedical_report">Premedical Results Status</label>
                                                    <select class="form-select form-control col-lg-12" type="text" name="premedical_report" id="premedical_report" required>
                                                        <option value="fit">Fit</option>
                                                        <option value="unfit">Unfit</option>
                                                    </select>
                                                        
                                                    </div>
                                                    </div>
                                                    <div class="form-group col-lg-12">
                                                        <div class="form-group mb-3">
                                                        <label for="issue">Issue</label>
                                                            <input type="text"  name="issue" value="{{$item->issue}}" class="form-control" placeholder="">
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="d-md-fle align-items-center mt-3">
                                                            <div class="ms-aut mt-3 mt-md-0">
                                                                <a href="/premedicalmodule/domestic-workers-with-premedical" button type="button" class="btn btn-primary text-white">Back</button></a>
                                                                <button type="submit" class="btn btn-info text-white">Submit Changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </form>
                                            @endforeach
                                    </div>
                                    </div>
                                    <div class="col-lg-3"></div>
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
