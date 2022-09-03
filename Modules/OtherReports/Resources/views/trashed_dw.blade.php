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
                                                <th>Name</th>
                                                <th>Workers contact</th>
                                                <th>nok contact</th>
                                                <th>Visa Payment</th>
                                                <th>Gcc Payment</th>
                                                <th>Visa Attachment</th>
                                                <th>Ticket Copy</th>
                                                <th>Passport Copy</th>
                                                <th>Pcr Results</th>
                                                <th>trashed on</th>
                                                <th>created by</th>
                                                @if(in_array('Can view option at documents', auth()->user()->getUserPermisions()))
                                                <th class="text-nowrap">Option</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($trashed_dws as $i =>$trashed)
                                            <tr>
                                                <td>{{$i + 1}}</td>
                                                <td hidden>{{$trashed->id}}</td>
                                                <td>{{$trashed->dw_first_name}} {{$trashed->dw_last_name}} {{$trashed->dw_other_name}}</td>
                                                <td>{{$trashed->dw_contact}}</td>
                                                <td>{{$trashed->nok_contact}}</td>
                                                <td>{{$trashed->vcs_passport_payment}}</td>
                                                <td>{{$trashed->gcc_payment}}</td>
                                                <td>{{$trashed->visa_attachment}}</td>
                                                <td>{{$trashed->ticket_copy}}</td>
                                                <td>{{$trashed->passport_copy}}</td>
                                                <td>{{$trashed->pcr_test_result}}</td>
                                                <td>{{$trashed->updated_at}}</td>
                                                <td>{{$trashed->name}}</td>
                                                @if(in_array('Can restore dw info at documents', auth()->user()->getUserPermisions()))
                                                <td>
                                                <a href="/otherreports/restore-dw/{{$trashed->id}}" class="btn btn-sm btn-info mb-1"> Restore DW</a>
                                                @endif
                                                @if(in_array('Can delete dw info permanently at documents', auth()->user()->getUserPermisions()))
                                                <button class="btn btn-sm btn-danger deleteDW" dw-id="" data-toggle="modal" data-target="#deleteDomesticWorker">Delete</button>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
      <form action="/otherreports/remove-from-trash" method="get">
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