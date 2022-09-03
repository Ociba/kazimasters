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
                                <form action="/clearancemodule/search-dw-lastname" method="get">
                                    @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="dw_last_name" placeholder="Search DW Last Name" aria-label="" aria-describedby="basic-addon1">
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
                                            <tr style="text-transform:uppercase;">
                                                <th>#</th>
                                                <th>Worker</th>
                                                <th>Workers Contact</th>
                                                <th>Nok Contact</th>
                                                <th>Contract Status</th>
                                                <th>Medical Status</th>
                                                <th>Interpol Status</th>
                                                <th>Passport Bio Data</th>
                                                <th>Ministry Clearance Letter</th>
                                                <th>Gcc</th>
                                                <th>Training Report</th>
                                                <th>Ticket</th>
                                                <th>Yellow Book</th>
                                                <th>Covid</th>
                                                <th>Departure Medical</th>
                                                <th>Created At</th>
                                                <th>created by</td>
                                                @if(in_array('Can view clearance option', auth()->user()->getUserPermisions()))
                                                <th>Option</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($get_cleared_dw as $i=>$cleared_dw)
                                            <tr>
                                                @php
                                                    if( $get_cleared_dw->currentPage() == 1){
                                                        $i = $i+1;
                                                    }else{
                                                        $i = ($i+1) + 10*($get_cleared_dw->currentPage()-1);
                                                    }
                                                @endphp
                                                <td>{{$i}}</td>
                                                <td hidden>{{$cleared_dw->id}}</td>
                                                <td>{{$cleared_dw->dw_first_name}} {{$cleared_dw->dw_last_name}} {{$cleared_dw->dw_other_name}}</td>
                                                <td>{{$cleared_dw->dw_contact}}</td>
                                                <td>{{$cleared_dw->nok_contact}}</td>
                                                <td>{{$cleared_dw->clearance_for_contract}}</td>
                                                <td>{{$cleared_dw->clearance_for_medical}}</td>
                                                <td>{{$cleared_dw->clearance_for_interpol}}</td>
                                                <td>{{$cleared_dw->passport_bio_data}}</td>
                                                <td>{{$cleared_dw->ministry_clearance_letter}}</td>
                                                <td>{{$cleared_dw->gcc}}</td>
                                                <td>{{$cleared_dw->training_report}}</td>
                                                <td>{{$cleared_dw->ticket}}</td>
                                                <td>{{$cleared_dw->yellow_book}}</td>
                                                <td>{{$cleared_dw->covid}}</td>
                                                <td>{{$cleared_dw->departure_medical}}</td>
                                                <td>{{$cleared_dw->created_at}}</td>
                                                <td>{{$cleared_dw->name}}</td>
                                                @if(in_array('Can edit dw info at clearance', auth()->user()->getUserPermisions()))
                                                <td class="text-nowrap">
                                                   <a href="/clearancemodule/edit-dw-info/{{$cleared_dw->id}}" class="btn btn-sm btn-success">Edit</a>
                                                   @endif
                                                   @if(in_array('Can trash dw info at Clearance', auth()->user()->getUserPermisions()))
                                                   <button class="btn btn-sm btn-danger deleteDW" dw-id="" data-toggle="modal" data-target="#deleteDomesticWorker">Delete</button>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                <div class="col-lg-6">
                                     <a href="/clearancemodule/print-cleared-workers" class="btn btn-success">Print</a>
                                </div>
                                 <div class="col-lg-6 text-end ml-2">
                                   {{$get_cleared_dw->links()}}
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
      <form action="/clearancemodule/trash-dw" method="get">
      <div class="modal-header d-flex justify-content-center bg-danger text-white">
        <h4 class="heading text-white">Are You sure,You want to Delete ?</h4>
        <input type="hidden" name="delete_dw" id="delete_dw">
      </div>

      <!--Body-->
      <div class="modal-body text-center">

        <span class="text-warning"><i class="ti-info-alt fa-4x animated rotateIn mb-4 icon-green"></i></span>
        <hr>
    </div>
    <!--Footer-->
    <div class="text-center mb-3">
        <button type="submit" class="btn btn-danger">Send To Trash, Yes</button>
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