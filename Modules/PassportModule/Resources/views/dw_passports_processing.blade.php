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
                                                <th>DW Name</th>
                                                <th>DW Contact</th>
                                                <th>Nok Contact</th>
                                                <th>Particulars</th>
                                                <th>Amount</th>
                                                <th>Remarks</th>
                                                <th>Incharge Passports</th>
                                                <th>Created AT</th>
                                                <th>Mark As</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($get_dw_with_passports_under_processing as $i=>$passport)
                                            <tr>
                                                @php
                                                    if( $get_dw_with_passports_under_processing->currentPage() == 1){
                                                        $i = $i+1;
                                                    }else{
                                                        $i = ($i+1) + 10*($get_dw_with_passports_under_processing->currentPage()-1);
                                                    }
                                                @endphp
                                                <td>{{$i}}</td>
                                                <td>{{$passport->dw_first_name}} {{$passport->dw_last_name}} {{$passport->dw_other_name}} </td>
                                                <td>{{$passport->dw_contact}}</td>
                                                <td>{{$passport->nok_contact}}</td>
                                                <td>{{$passport->particulars}}</td>
                                                <td>{{ number_format($passport->amount)}} /=</td>
                                                <td>{{$passport->remarks}}</td>
                                                <td>{{$passport->name}}</td>
                                                <td>{{$passport->created_at}}</td>
                                                <td>
                                                    <a href="/passportmodule/mark-as-received/{{$passport->domestic_worker_id}}" class="btn btn-sm btn-success mb-1">Received</a>
                                                    <a href="/passportmodule/mark-as-not-received/{{$passport->domestic_worker_id}}" class="btn btn-sm btn-primary">Not Received</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                    <a href="/passportmodule/passports-to-be-processed" class="btn btn-success">Print</a>
                                    </div>
                                    <div class="col-lg-6 text-end ml-2">
                                        {{$get_dw_with_passports_under_processing->links()}}
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
      <form action="/registramodule/" method="get">
      <div class="modal-header d-flex justify-content-center bg-warning text-white">
        <h4 class="heading text-white">Are You sure,You want to Delete ?</h4>
      </div>

      <!--Body-->
      <div class="modal-body text-center">

        <span class="text-warning"><i class="ti-info-alt fa-4x animated rotateIn mb-4 icon-green"></i></span>
        <hr>
    </div>
    <!--Footer-->
    <div class="text-center mb-3">
        <button type="submit" class="btn btn-primary">Yes</button>
        <button type="button" class="btn btn-danger waves-effect text-start text-white" data-bs-dismiss="modal">No</button>
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