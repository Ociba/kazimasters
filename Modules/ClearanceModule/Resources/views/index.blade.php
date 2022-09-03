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
                                    <form action="/clearancemodule/search-dw" method="get">
                                    @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="visa_number" placeholder="Search Worker Visa Number" aria-label="" aria-describedby="basic-addon1">
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
                                                <th>Name</th>
                                                <th>Workers Contact</th>
                                                <th>nok Contact</th>
                                                <th>Training Report</th>
                                                <th>Contract</th>
                                                <th>Visa Number</th>
                                                <th>Created At</th>
                                                <th>created by</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($get_dw_to_be_cleared as $i=>$training)
                                            <tr>
                                                @php
                                                    if( $get_dw_to_be_cleared->currentPage() == 1){
                                                        $i = $i+1;
                                                    }else{
                                                        $i = ($i+1) + 10*($get_dw_to_be_cleared->currentPage()-1);
                                                    }
                                                @endphp
                                                <td>{{$i}}</td>
                                                <td>{{$training->dw_first_name}} {{$training->dw_last_name}} {{$training->dw_other_name}}</td>
                                                <td>{{$training->dw_contact}}</td>
                                                <td>{{$training->nok_contact}}</td>
                                                <td><a href="{{ asset('dw_training_performance_report/'.$training->training_performance_report)}}" style="color:blue;" target="_blank">view Report</td>
                                                <td><a href="{{ asset('dw_contract/'.$training->contract)}}" style="color:orange;" target="_blank">view contract</td>
                                                <td>{{$training->visa_number}}</td>
                                                <td>{{$training->created_at}}</td>
                                                <td>{{$training->name}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                <div class="text-end ml-2">
                                 {{$get_dw_to_be_cleared->links()}}
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
      <form action="/trainingmodule/" method="get">
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
        <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No</a>
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