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
                                @foreach($dw_info as $others)
                                    <form class="mt-4" action="/otherreports/update-dw-info/{{request()->route()->dw_id}}" method="post">
                                    @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                <input type="hidden" name="domestic_worker_id" id="" value="{{request()->route()->dw_id}}">
                                                    <input type="file" class="form-control" name="vcs_passport_payment" value="{{$others->vcs_passport_payment}}"
                                                        placeholder="">
                                                    <label for="vcs_passport_payment">VCS Passport Payment</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="file" class="form-control" name="gcc_payment" value="{{$others->gcc_payment}}"
                                                        placeholder="">
                                                    <label for="gcc_payment">Gcc Payment</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="file" class="form-control" name="visa_attachment" value="{{$others->visa_attachment}}"
                                                        placeholder="">
                                                    <label for="visa_attachment">Visa Attachment</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="file" class="form-control" name="ticket_copy" value="{{$others->ticket_copy}}"
                                                        placeholder="">
                                                    <label for="ticket_copy">Ticket Copy</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="file" class="form-control" name="passport_copy" value="{{$others->passport_copy}}"
                                                        placeholder="">
                                                    <label for="passport_copy">PassPort Copy</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="file" class="form-control" name="pcr_test_result" value="{{$others->pcr_test_result}}"
                                                        placeholder="">
                                                    <label for="pcr_test_result">PCR Test Results</label>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="d-md-fle align-items-center mt-3">
                                                    <div class="ms-aut mt-3 mt-md-0">
                                                        <a href="/otherreports/successful-dw" button type="button" class="btn btn-primary text-white">Back</button></a>
                                                        <button type="submit" class="btn btn-info text-white">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
                                    @endforeach
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