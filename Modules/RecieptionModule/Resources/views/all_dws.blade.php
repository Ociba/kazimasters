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
                                <form action="/recieptionmodule/search-dw" method="get">
                                   @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="dw_contact" placeholder="Search By Workers Contact" aria-label="" aria-describedby="basic-addon1">
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
                                            <tr>
                                                <th>#</th>
                                                <th>Last Name</th>
                                                <th>First Name</th>
                                                <th>Other Name</th>
                                                <th>Contact</th>
                                                <th>Created at</th>
                                                <th>Created By</th>
                                                <th>More Info</th>
                                                @if(in_array('Can view option at receptions', auth()->user()->getUserPermisions()))
                                                <th class="text-nowrap">Option</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($get_all_domestic_workers as $i=>$registered_dw)
                                            <tr>
                                            @php
                                                if( $get_all_domestic_workers->currentPage() == 1){
                                                    $i = $i+1;
                                                }else{
                                                    $i = ($i+1) + 10*($get_all_domestic_workers->currentPage()-1);
                                                }
                                            @endphp
                                                <td>{{$i}}</td>
                                                <td hidden>{{$registered_dw->id}}</td>
                                                <td>{{$registered_dw->dw_last_name}}</td>
                                                <td>{{$registered_dw->dw_first_name}}</td>
                                                <td>{{$registered_dw->dw_other_name}}</td>
                                                <td>{{$registered_dw->dw_contact}}</td>
                                                <td>{{$registered_dw->created_at}}</td>
                                                <td>{{$registered_dw->name}}</td>
                                                <td><a href="/recieptionmodule/view-more-dw-info/{{$registered_dw->id}}" class="btn btn-info btn-sm">View More</a></td>
                                                @if(in_array('Can edit dw at reception', auth()->user()->getUserPermisions()))
                                                <td>
                                                <a href="/recieptionmodule/edit-dw-form/{{$registered_dw->id}}" class="btn btn-info btn-sm mb-1">Edit</a>
                                                @endif
                                                @if(in_array('Can delete dw at reception', auth()->user()->getUserPermisions()))
                                                <button class="btn btn-sm btn-danger deleteDW" dw-id="" data-toggle="modal" data-target="#deleteDomesticWorker">Trash</button>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        {{$get_all_domestic_workers->links()}}
                                    </div>
                                    <div class="col-lg-4"><a href="/recieptionmodule/view-print-page" class="btn btn-success">print</a></div>
                                    <div class="col-lg-4 text-end">
                                        <a href="/recieptionmodule/register-new-domestic-worker"  class="btn btn-info add-new text-end"><i class="fa fa-plus"></i> Add New  Worker</a>
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
    <!--Delete modal-->
<div class="modal fade" id="deleteDomesticWorker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <form action="/recieptionmodule/trash-dw-data" method="get">
      <div class="modal-header d-flex justify-content-center bg-danger text-white">
        <h4 class="heading text-white">Are You sure,You want to Delete ?</h4>
        <input type="hidden" name="delete_dw" id="delete_dw">
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
            document.getElementById('delete_dw').setAttribute("Value", dw_delete);
            });
            
    </script>
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