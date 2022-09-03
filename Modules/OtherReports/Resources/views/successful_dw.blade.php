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
                                  <form action="/otherreports/search-successful-dw" method="get">
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
                                                <th>Name</th>
                                                <th>workers</th>
                                                <th>nok contact</th>
                                                <th>Visa Payment</th>
                                                <th>Gcc Payment</th>
                                                <th>Visa Attachment</th>
                                                <th>Ticket Copy</th>
                                                <th>Passport Copy</th>
                                                <th>view More</th>
                                                <th>Created at</th>
                                                <th>created by</th>
                                                @if(in_array('Can view option at Documents', auth()->user()->getUserPermisions()))
                                                <th class="text-nowrap">Option</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($get_cleared_dw as $i =>$payments)
                                            <tr>
                                                @php
                                                    if( $get_cleared_dw->currentPage() == 1){
                                                        $i = $i+1;
                                                    }else{
                                                        $i = ($i+1) + 10*($get_cleared_dw->currentPage()-1);
                                                    }
                                                @endphp
                                                <td>{{$i}}</td>
                                                <td hidden>{{$payments->id}}</td>
                                                <td>{{$payments->dw_first_name}} {{$payments->dw_last_name}} {{$payments->dw_other_name}}</td>
                                                <td>{{$payments->dw_contact}}</td>
                                                <td>{{$payments->nok_contact}}</td>
                                                <td><a href="{{ asset('dw_vcs_passport_payment/'.$payments->vcs_passport_payment)}}" style="color:blue;" target="_blank">view Payment</td>
                                                <td><a href="{{ asset('dw_gcc_payment/'.$payments->gcc_payment)}}" style="color:blue;" target="_blank">view Payment</td>
                                                <td><a href="{{ asset('dw_visa_attachment/'.$payments->visa_attachment)}}" style="color:blue;" target="_blank">view attachment</td>
                                                <td><a href="{{ asset('dw_ticket_copy/'.$payments->ticket_copy)}}" style="color:blue;" target="_blank">view ticket</td>
                                                <td><a href="{{ asset('dw_passport_copy/'.$payments->passport_copy	)}}" style="color:blue;" target="_blank">view passport copy</td>
                                                <td> <a href="/otherreports/view-more-info/{{$payments->dw_at_other_reports_level_id}}" class="btn btn-sm btn-success mb-1"> View More</a></td>
                                                <td>{{$payments->created_at}}</td>
                                                <td>{{$payments->name}}</td>
                                                @if(in_array('Can edit dw info at documents', auth()->user()->getUserPermisions()))
                                                <td>
                                                {{--<a href="/otherreports/edit-dw-info/{{$payments->id}}" class="btn btn-sm btn-success mb-1"> Edit</a>--}}
                                                @endif
                                                @if(in_array('Can trash dw info at documents', auth()->user()->getUserPermisions()))
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
                                   <a href="/otherreports/print-worker-with-cleared-documents" class="btn btn-success">Print</a>
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
      <form action="/otherreports/trash-from-successful" method="get">
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