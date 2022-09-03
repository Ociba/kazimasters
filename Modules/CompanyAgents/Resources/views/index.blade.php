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
                                <form action="/companyagents/search-agent" method="get">
                                    @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="agent_nin" placeholder="Search Agent NIN" aria-label="" aria-describedby="basic-addon1">
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
                                            <tr style="text-transform: uppercase">
                                                <th>#</th>
                                                <th>NAME</th>
                                                <th>Nin</th>
                                                <th>Contact</th>
                                                <th>Created At</th>
                                                <th>created by</th>
                                                <th>OPTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($get_agent_info as $i =>$agent)
                                            <tr>
                                            @php
                                                if( $get_agent_info->currentPage() == 1){
                                                    $i = $i+1;
                                                }else{
                                                    $i = ($i+1) + 10*($get_agent_info->currentPage()-1);
                                                }
                                            @endphp
                                                <td>{{$i}}</td>
                                                <td hidden>{{$agent->id}}</td>
                                                <td>{{$agent->last_name}} {{$agent->first_name}} {{$agent->other_names}}</td>
                                                <td>{{$agent->agent_nin}}</td>
                                                <td>{{$agent->phone_number}}</td>
                                                <td>{{$agent->created_at}}</td>
                                                <td>{{$agent->name}}</td>
                                                <td>
                                                <a href="/companyagents/view-dws/{{$agent->id}}" class="btn btn-sm btn-info mb-1">View Workers</a>
                                                @if(in_array('Can edit dw info at Company agents registration', auth()->user()->getUserPermisions()))
                                                <a href="/companyagents/edit-company-agent/{{$agent->id}}" class="btn btn-sm btn-success mb-1">Edit</a>
                                                @endif
                                                @if(in_array('Can trash dw info company agents registration', auth()->user()->getUserPermisions()))
                                                <button class="btn btn-sm btn-danger deleteDW" dw-id="" data-toggle="modal" data-target="#deleteDomesticWorker">Delete</button> 
                                                @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        {{$get_agent_info->links()}}
                                    </div>
                                    <div class="col-lg-4">
                                    <a href="/companyagents/print-company-agents" class="btn btn-success">Print Agent Information</a>
                                    </div>
                                    <div class="col-lg-4 text-end ml-2">
                                        <a href="/companyagents/register-company-agents" button type="button" class="btn btn-info add-new text-end"><i class="fa fa-plus"></i> Add New Company Agent</button></a>
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
      <form action="/companyagents/trash" method="get">
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
            document.getElementById('delete_agent').setAttribute("Value", dw_delete);
            });
            
    </script>
</body>
</html>