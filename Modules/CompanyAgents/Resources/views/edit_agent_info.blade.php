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
                                   @foreach($agent_info as $agent)
                                    <form class="mt-4" action="/companyagents/update-company-agent/{{request()->route()->agent_id}}" method="get">
                                       @csrf
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="first_name" value="{{$agent->first_name}}"
                                                        placeholder="">
                                                    <label for="first_name">First Name</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="last_name" value="{{$agent->last_name}}"
                                                        placeholder="">
                                                    <label for="last_name">Last Name</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="other_names" value="{{$agent->other_names}}"
                                                        placeholder="">
                                                    <label for="other_names">Other Names</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="agent_nin" value="{{$agent->agent_nin}}"
                                                        placeholder="">
                                                    <label for="agent_nin">Agent NIN</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="phone_number"  value="{{$agent->phone_number}}"
                                                        placeholder="">
                                                    <label for="phone_number">Phone Number</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-md-fle align-items-center mt-3">
                                                    <div class="ms-aut mt-3 mt-md-0">
                                                        <a href="/companyagents/company-agents" button type="button" class="btn btn-primary text-white">Back</button></a>
                                                        <button type="submit" class="btn btn-info text-white">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    @endforeach
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
