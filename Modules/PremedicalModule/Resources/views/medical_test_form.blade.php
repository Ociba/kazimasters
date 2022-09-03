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
                    <div class="col-md-12">
                        <div class="card card-body printableArea">
                            @foreach($get_pmt_form_for_dw as $results)
                            <h3 class="text-center font-weight-900" style="text-transform:uppercase;"><b>{{$results->health_facility}}</b></h3>
                            <h4 class="text-center" style="text-transform:uppercase;"><b>{{$results->address}}</b></h4>
                            <h6 class="text-center" style="font-weight:bold;"><b>Office Telephone: {{$results->phone_contact}}</b></h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <span  class="me-3 img-fluid w-75 pull-right"><p class="">NAME: <u><span style="font-weight:bold;">{{$results->dw_first_name}} {{$results->dw_last_name}} {{$results->dw_other_name}}</span></u>
                                                <br/> PASSPORT NO. <U>{{$results->passport_number}}</U>
                                                <br/> DATE OF TEST: <u>{{$results->created_at}}</u>
                                                <br/> PASSPORT ISSUE DATE :
                                                <br/> RECRUITING AGENT: <u>Mariba Agencies</u></p>
                                            </span>
                                            <div class="media-body">
                                                <h5 class="mt-0"><p class="m-l-5">
                                                <br/> <span style="font-size:14px;">DESIRED JOB:</span> <u>{{$results->desired_job}}</u>
                                                <br/> <span style="font-size:14px;">MARITAL STATUS:</span> <u>{{$results->marital_status}}</u>
                                                <br/> <span style="font-size:14px;"> DOB:</span>  {{$results->date_of_birth}}
                                                <br/> <span style="font-size:14px;">SEX:</span> <u>{{$results->sex}}</u></p>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-12 mr-0 ml-3 mt-1">
                                    <div class="table-responsive m-t-40" style="clear: both;">
                                        <table class="table table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Name of Test</th>
                                                    <th class="">Result</th>
                                                    <th class="">Comments</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">1</td>
                                                    <td>{{$results->hiv_name_of_test}}</td>
                                                    <td class="">{{$results->hiv_result}} </td>
                                                    <td class=""> {{$results->hiv_comments}} </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">2</td>
                                                    <td>{{$results->hcg}}</td>
                                                    <td class="">{{$results->hcg_result}} </td>
                                                    <td class=""> {{$results->hcg_comments}} </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">3</td>
                                                    <td>{{$results->hepatitis_b}}</td>
                                                    <td class="">{{$results->hepb_result}} </td>
                                                    <td class=""> {{$results->hep_b_comments}} </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">4</td>
                                                    <td>{{$results->hemoglobin	}}</td>
                                                    <td class="">{{$results->hemoglobin_result}} </td>
                                                    <td class=""> {{$results->hemoglobin_comments}} </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="media">
                                            <span  class="me-3 img-fluid w-75">Issuing Officer: {{$results->name}}</span>
                                            <div class="media-body">
                                                <h5 class="mt-0">stamp & signature.............</h5>
                                            </div>
                                        </div>
                                        <p>NOTE:</p>
                                        <p>This is a confidential report/Certificate that should only be handled by the client or persons authorized by the Client named above.</p>
                                        <p>All tests carried out have passed the Quality Control measures using standardized procedures.</p>
                                        <p>The client and / or representative acknowledge this report/ certificate is given as per their consent to get the tests done and accept
                                          the results that will be presented, there is no external influence on any party involved to change or manupulate the results.</p>
                                        <p><span style="font-weight:bold;">{{$results->health_facility}}</span> certifies that this report is authentic, true and with no alternations s per the date of test indicated.</p>
                                        <p>The results issued hereby are <span style="font-weight:bold;">valid for 30 days from date of issue.</span></p>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-12">
                                    <hr>
                                    @if(in_array('Can view Premedical', auth()->user()->getUserPermisions()))
                                    <div class="text-center">
                                        <button id="print" class="btn btn-success btn-outline" type="button"> Print</button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
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
        <script src="{{ asset('admin/dist/js/pages/jquery.PrintArea.js')}}" type="text/JavaScript"></script>
        <script>
        $(document).ready(function() {
            $("#print").click(function() {
                var mode = 'iframe'; //popup
                var close = mode == "popup";
                var options = {
                    mode: mode,
                    popClose: close
                };
                $("div.printableArea").printArea(options);
            });
        });
        </script>
    </body>
</html>
