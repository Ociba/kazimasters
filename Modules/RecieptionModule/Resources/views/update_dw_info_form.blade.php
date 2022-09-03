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
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        @include('layouts.messages')
                        <div class="card">
                            <div class="card-body">
                                @foreach($user_data as $data)
                                <form action="/recieptionmodule/update-user-data/{{$data->id}}" method="get">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="dw_first_name" value="{{$data->dw_first_name}}" id="tb-fname"
                                                    placeholder="">
                                                <label for="tb-fname">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="dw_other_name" value="{{$data->dw_other_name}}" id="tb-name"
                                                    placeholder="">
                                                <label for="tb-name">Other Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="dw_last_name" value="{{$data->dw_last_name}}" id="tb-name"
                                                    placeholder="">
                                                <label for="tb-name">Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="dw_contact" value="{{$data->dw_contact}}" id="tb-dw_contact"
                                                    placeholder="">
                                                <label for="tb-dw_contact">Workers Contact</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="passport_number" value="{{$data->passport_number}}" id="tb-passport_number"
                                                    placeholder="">
                                                <label for="tb-passport_number">Passport Number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="dw_location" value="{{$data->dw_location}}" id="tb-dw_location"
                                                    placeholder="">
                                                <label for="tb-dw_location">Dw Location</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="next_of_kin" value="{{$data->next_of_kin}}" id="tb-next_of_kin"
                                                    placeholder="">
                                                <label for="tb-next_of_kin">Next of Kin</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="nok_contact" value="{{$data->nok_contact}}" id="tb-nok_contact"
                                                    placeholder="">
                                                <label for="tb-nok_contact">Next of Kin Contact</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="reason_for_coming" value="{{$data->reason_for_coming}}" id="tb-reason"
                                                    placeholder="">
                                                <label for="tb-reason">Reason</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="text-center mt-3">
                                                <div class="ms-auto mt-3 mt-md-0">
                                                <a href="/recieptionmodule/all-domestic-workers" button type="button" class="btn btn-primary text-white">Back</button></a>
                                                    <button type="submit" class="btn btn-info text-white">Submit Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
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
    <div class="modal bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Enter Domestic Worker Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form class="mt-4" action="/recieptionmodule/save-domestic-worker" method="get">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="dw_first_name" id="tb-dw_first_name"
                                placeholder="">
                            <label for="tb-dw_first_name">First Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="dw_last_name" id="tb-email"
                                placeholder="">
                            <label for="tb-email">Last Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="dw_other_name" id="tb-email"
                                placeholder="">
                            <label for="tb-email">Other Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea type="text" name="reason_for_coming" class="form-control" rows="5" id="tb-email"
                                placeholder=""></textarea>
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