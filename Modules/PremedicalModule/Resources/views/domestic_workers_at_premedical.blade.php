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
                                            <form action="/premedicalmodule/search-dw_last_name" method="get">
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
                                                <tr style="text-transform: capitalize">
                                                    <th>#</th>
                                                    <th>NAME</th>
                                                    <th>Dw Contact</th>
                                                    <th>Nok Contact</th>
                                                    <th>Premedical RESULTs</th>
                                                    <th>Issue</th>
                                                    <th>ISSUIDE BY</th>
                                                    <th>DATE OF CREATION</th>
                                                    <th>OPTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($all_domestic_workers as $i=>$dw_registered_today)
                                                <tr>
                                                @php
                                                    if( $all_domestic_workers->currentPage() == 1){
                                                        $i = $i+1;
                                                    }else{
                                                        $i = ($i+1) + 10*($all_domestic_workers->currentPage()-1);
                                                    }
                                                @endphp
                                                    <td>{{$i}}</td>
                                                    <td hidden>{{$dw_registered_today->domestic_worker_id}}</td>
                                                    <td>{{$dw_registered_today->dw_first_name}} {{$dw_registered_today->dw_last_name}} {{$dw_registered_today->dw_other_name}}</td>
                                                    <td>{{$dw_registered_today->dw_contact}}</td>
                                                    <td>{{$dw_registered_today->nok_contact}}</td>
                                                    <td>
                                                        @if($dw_registered_today->premedical_report == 'fit')
                                                        <span class="badge square-pill bg-success text-white ms-auto">{{$dw_registered_today->premedical_report}}</span>
                                                        @else
                                                        <span class="badge square-pill bg-primary text-white ms-auto">{{$dw_registered_today->premedical_report}}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$dw_registered_today->issue}}</td>
                                                    <td>{{$dw_registered_today->name}}</td>
                                                    <td>{{$dw_registered_today->created_at}}</td>
                                                   
                                                    <td class="text-nowrap" style="width:10px">
                                                        <a href="/premedicalmodule/edit-dw-premedical-info/{{$dw_registered_today->domestic_worker_id}}" class="btn btn-info btn-sm mb-1">Edit</a>
                                                         @if(in_array('Can trash dw at premedical', auth()->user()->getUserPermisions()))
                                                        <button class="btn btn-sm btn-danger deleteDW" dw-id="" data-toggle="modal" data-target="#deleteDomesticWorker">Delete</button>
                                                         @endif
                                                    </td>
                                                    
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a href="/premedicalmodule/view-print-page" class="btn btn-success">Print</a>
                                        </div>
                                        <div class="col-lg-6 text-end ml-2">
                                                {{$all_domestic_workers->links()}}
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
        <script src="{{ asset('assets/plugins/notification/js/bootstrap-growl.min.js')}}"></script>
    <div class="modal fade" id="deleteDomesticWorker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
        <!--Header-->
        <form action="/premedicalmodule/trash-domestic-worker" method="get">
        <div class="modal-header d-flex justify-content-center bg-danger text-white">
            <h4 class="heading text-white">Are You sure,You want to Delete ?</h4>
        </div>
        <input type="hidden" name="delete_dw" id="delete_dw">
        <!--Body-->
        <div class="modal-body text-center">

            <span class="text-danger"><i class="ti-info-alt fa-4x animated rotateIn mb-4 icon-green"></i></span>
            <hr>
        </div>
        <!--Footer-->
        <div class="text-center mb-3">
            <button type="submit" class="btn btn-danger">Yes</button>
            <button type="button" class="btn btn-info waves-effect text-start text-white" data-bs-dismiss="modal">No</button>
        </div>
        </form>
        </div>
        <!--/.Content-->
    </div>
    </div>
        <script>
            $(document).on('click','.deleteDW',function(){
                var userID=$(this).attr('dw-id');
                $('#id').val(userID); 
                $('#deleteDomesticWorker').modal('show'); 
            });
                
                $('button[data-toggle = "modal"]').click(function(){
                var dw_delete = $(this).parents('tr').children('td').eq(1).text();
                document.getElementById('delete_dw').setAttribute("Value", dw_delete);
                });
        </script>
    </body>
</html>
