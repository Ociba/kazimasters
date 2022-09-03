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
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Reason</th>
                                                @if(in_array('Can view option at reception', auth()->user()->getUserPermisions()))
                                                <th>Option</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($get_trashed_domestic_workers as $i=>$trashed_dw)
                                            <tr>
                                                <td hidden>{{$trashed_dw->id}}</td>
                                                <td>{{$i + 1}}</td>
                                                <td>{{$trashed_dw->dw_last_name}} {{$trashed_dw->dw_other_name}} {{$trashed_dw->dw_first_name}}</td>
                                                <td>{{$trashed_dw->reason_for_coming}}</td>
                                               
                                                <td>
                                                  <a href="/recieptionmodule/view-more-dw-info/{{$trashed_dw->id}}" class="btn btn-info btn-sm">View More</a>
                                                  @if(in_array('Can restore dw info at reception', auth()->user()->getUserPermisions()))
                                                    <a href="/recieptionmodule/restore-dw-from-trash/{{$trashed_dw->id}}"><button class="btn btn-sm btn-info">Restore</button></a>
                                                    @endif
                                                    @if(in_array('Can delete dw info permanently at reception', auth()->user()->getUserPermisions()))
                                                    <button class="btn btn-sm btn-danger deleteDW" dw-id="" data-toggle="modal" data-target="#deleteDomesticWorker">Delete</button>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="text-right ml-2">
                                        {{$get_trashed_domestic_workers->links()}}
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
<script src="{{ asset('assets/plugins/notification/js/bootstrap-growl.min.js')}}"></script>
<div class="modal fade" id="deleteDomesticWorker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
        <!--Header-->
        
        <form action="/recieptionmodule/delete-from-trash" method="get">
        <div class="modal-header d-flex justify-content-center bg-danger text-white">
            <h4 class="heading text-white">This action can not be undone, are you sure you want to delete this Domestic Worker??</h4>
            <input type="hidden" name="delete_dw" id="delete_dw">
        </div>

        <!--Body-->
        <div class="modal-body text-center">

        <span class="text-danger"><i class="ti-info-alt fa-4x animated rotateIn mb-4 icon-green"></i></span>

    </div>
    <!--Footer-->
    <div class="text-center mb-3">
        <button type="submit" class="btn btn-danger">Its okay, delete</button>
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
        var dw_delete = $(this).parents('tr').children('td').eq(0).text();
        document.getElementById('delete_dw').setAttribute("Value", dw_delete);
        });

    </script>
</body>
</html>