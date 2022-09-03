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
                                @foreach($dw_info as $dw_info)
                                    <form class="mt-4" action="/clearancemodule/update-dw-clearance/{{request()->route()->dw_id}}" method="get">
                                    @csrf
                                    <div class="row text-center">
                                            <div class="col-md-6">
                                                <input type="hidden" name="domestic_worker_id" id="" value="{{request()->route()->dw_id}}">
                                                <div class="form-group">
                                                    <label class="form-label">Contract Clearance</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio11" name="clearance_for_contract" value="pending" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio11">Pending</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio22" name="clearance_for_contract" value="cleared" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio22">Cleared</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Medical Clearance</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio12" name="clearance_for_medical" value="pending" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio12">Pending</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio13" name="clearance_for_medical" value="cleared" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio13">Cleared</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Interpool Clearance</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio14" name="clearance_for_interpol" value="pending" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio14">Pending</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio15" name="clearance_for_interpol" value="cleared" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio15">Cleared</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">PassPort Bio Data</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio16" name="passport_bio_data" value="pending" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio16">Pending</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio17" name="passport_bio_data" value="cleared" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio17">Cleared</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Ministry Clearance Letter</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio18" name="ministry_clearance_letter" value="pending" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio18">Pending</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio19" name="ministry_clearance_letter" value="cleared" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio19">Cleared</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Gcc</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio20" name="gcc" value="pending" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio20">Pending</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio21" name="gcc" value="cleared" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio21">Cleared</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Training Report</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio22" name="training_report" value="pending" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio22">Pending</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio23" name="training_report" value="cleared" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio23">Cleared</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Ticket</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio24" name="ticket" value="pending" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio24">Pending</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio25" name="ticket" value="cleared" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio25">Cleared</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Yellow Book (Yellow Fever)</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio26" name="yellow_book" value="pending" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio26">Pending</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio27" name="yellow_book" value="cleared" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio27">Cleared</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label">Covid</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio28" name="covid" value="pending" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio28">Pending</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio29" name="covid" value="cleared" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio29">Cleared</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Departure Medical</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio30" name="departure_medical" value="fit" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio30">Fit</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio31" name="departure_medical" value="unfit" class="form-check-input">
                                                        <label class="form-check-label text-muted" for="customRadio31">Un fit</label>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="d-md-fle align-items-center mt-3">
                                                    <div class="ms-aut mt-3 mt-md-0">
                                                        <a href="/clearancemodule/domestic-workers-cleared" button type="button" class="btn btn-primary text-white">Back</button></a>
                                                        <button type="submit" class="btn btn-info text-white">Submit</button>
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