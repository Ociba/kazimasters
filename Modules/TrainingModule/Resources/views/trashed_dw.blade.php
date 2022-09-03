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
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr style="text-transform:uppercase;">
                                                <th>#</th>
                                                <th>DW Name</th>
                                                <th>DW Contact</th>
                                                <th>nok Contact</th>
                                                <th>Training Report</th>
                                                <th>Contract</th>
                                                <th>Visa Number</th>
                                                <th>Trashed At</th>
                                                <th>created by</th>
                                                @if(in_array('Can view option in trash at training', auth()->user()->getUserPermisions()))
                                                <th class="text-nowrap">Option</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($trashed_dw as $i=>$trashed_training)
                                            <tr>
                                                @php
                                                    if( $trashed_dw->currentPage() == 1){
                                                        $i = $i+1;
                                                    }else{
                                                        $i = ($i+1) + 10*($trashed_dw->currentPage()-1);
                                                    }
                                                @endphp
                                                <td>{{$i}}</td>
                                                <td hidden>{{$trashed_training->id}}</td>
                                                <td>{{$trashed_training->dw_last_name}} {{$trashed_training->dw_other_name}} {{$trashed_training->dw_first_name}}</td>
                                                <td>{{$trashed_training->dw_contact}}</td>
                                                <td>{{$trashed_training->nok_contact}}</td>
                                                <td><a href="{{ asset('dw_training_performance_report/'.$trashed_training->training_performance_report)}}" style="color:blue;" target="_blank">view Report</td>
                                                <td><a href="{{ asset('dw_contract/'.$trashed_training->contract)}}" style="color:orange;" target="_blank">view contrac
                                                <td>{{$trashed_training->visa_number}}</td>
                                                <td>{{$trashed_training->updated_at}}</td>
                                                <td>{{$trashed_training->name}}</td>
                                                @if(in_array('Can restore trashed dw at training', auth()->user()->getUserPermisions()))
                                                <td class="text-nowrap">
                                                   <a href="/trainingmodule/restore-delete_dw/{{$trashed_training->id}}" class="btn btn-sm btn-info"> Restore DW</a>
                                                   @endif
                                                   @if(in_array('Can delete dw permanently at training trash', auth()->user()->getUserPermisions()))
                                                   <button class="btn btn-sm btn-danger deleteDW" dw-id="" data-toggle="modal" data-target="#deleteDomesticWorker">Delete</button>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                  <div class="text-end ml-2">
                                     {{$trashed_dw->links()}}
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
      <form action="/trainingmodule/remove-from-trash" method="get">
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
        <button type="submit" class="btn btn-danger">Delete Permanently, Yes</button>
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