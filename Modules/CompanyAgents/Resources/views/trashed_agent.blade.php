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
                                </div>
                                </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr style="text-transform: uppercase">
                                                <th>#</th>
                                                <th>NAME</th>
                                                <th>Agent Nin</th>
                                                <th>Agent Phone Number</th>
                                                <th>trashed on</th>
                                                <th>created by</th>
                                                @if(in_array('Can view option at Company agents registration trash', auth()->user()->getUserPermisions()))
                                                <th>OPTION</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($trashed_agent as $i =>$agent)
                                            <tr>
                                            @php
                                                if( $trashed_agent->currentPage() == 1){
                                                    $i = $i+1;
                                                }else{
                                                    $i = ($i+1) + 10*($trashed_agent->currentPage()-1);
                                                }
                                            @endphp
                                                <td>{{$i}}</td>
                                                <td hidden>{{$agent->id}}</td>
                                                <td>{{$agent->last_name}} {{$agent->first_name}} {{$agent->other_names}}</td>
                                                <td>{{$agent->agent_nin}}</td>
                                                <td>{{$agent->phone_number}}</td>
                                                <td>{{$agent->updated_at}}</td>
                                                <td>{{$agent->name}}</td>
                                                @if(in_array('Can restore dw info at Company agents registration trash', auth()->user()->getUserPermisions()))
                                                <td>
                                                <a href="/companyagents/restore-company-agent/{{$agent->id}}" class="btn btn-sm btn-info">Restore Agent</a>
                                                @endif
                                                @if(in_array('Can delete dw info permanently at Company agents registration trash', auth()->user()->getUserPermisions()))
                                                <button class="btn btn-sm btn-danger deleteAgent" dw-id="" data-toggle="modal" data-target="#deleteDomesticWorker">Delete</button> 
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="text-end ml-2">
                                        {{$trashed_agent->links()}}
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
      <form action="/companyagents/remove-from-trash" method="get">
      <div class="modal-header d-flex justify-content-center bg-danger text-white">
        <h4 class="heading text-white">Are You sure,You want to Delete ?</h4>
        <input type="hidden" name="delete_agent" id="delete_agent">
      </div>

      <!--Body-->
      <div class="modal-body text-center">

        <span class="text-danger"><i class="ti-info-alt fa-4x animated rotateIn mb-4 icon-green"></i></span>
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
        $(document).on('click','.deleteAgent',function(){
            var userID=$(this).attr('agent-id');
            $('#id').val(userID); 
            $('#deleteDomesticWorker').modal('show'); 
        });
          $('button[data-toggle = "modal"]').click(function(){
            var agent_delete = $(this).parents('tr').children('td').eq(1).text();
            document.getElementById('delete_agent').setAttribute("Value", agent_delete);
            });
            
    </script>
</body>
</html>