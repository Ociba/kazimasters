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
                                                <tr style="text-transform: capitalize">
                                                    <th>#</th>
                                                    <th>Number of DW Required</th>
                                                    <th>Number of DW Taken</th>
                                                    <th>Total Amount</th>
                                                    <th>Amount Deposited</th>
                                                    <th>Balance</th>
                                                    <th>trashed on</th>
                                                    @if(in_array('Can view trash job orders option', auth()->user()->getUserPermisions()))
                                                    <th>OPTIONS</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($trashed_job_order as $i=>$order)
                                                <tr>
                                                @php
                                                    if( $trashed_job_order->currentPage() == 1){
                                                        $i = $i+1;
                                                    }else{
                                                        $i = ($i+1) + 10*($trashed_job_order->currentPage()-1);
                                                    }
                                                @endphp
                                                    <td>{{$i}}</td>
                                                    <td hidden>{{$order->id}}</td>
                                                    <td>{{$order->number_of_dws_required}}</td>
                                                    <td>{{$order->number_of_dws_taken}}</td>
                                                    <td>{{number_format($order->total_amount)}} /=</td>
                                                    <td>{{ number_format($order->amount_deposited)}} /=</td>
                                                    <td>{{number_format($order->total_amount-$order->amount_deposited)}} /=</td>
                                                    <td>{{$order->updated_at}}</td>
                                                    @if(in_array('Can restore trashed job orders info', auth()->user()->getUserPermisions()))
                                                    <td class="text-nowrap" style="width:10px">
                                                        <a href="/joborder/restore-job-order/{{$order->id}}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-original-title="Edit"> Restore</a>
                                                        @endif
                                                        @if(in_array('Can delete trashed job orders info permanently', auth()->user()->getUserPermisions()))
                                                        <button class="btn btn-sm btn-danger deleteOrder" order-id="" data-toggle="modal" data-target="#deleteDomesticWorker">Delete</button>
                                                        
                                                    </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                    <div class="text-end ml-2">
                                    {{$trashed_job_order->links()}}
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
        <form action="/joborder/remove-job-order-from-trash" method="get">
        <div class="modal-header d-flex justify-content-center bg-danger text-white">
            <h4 class="heading text-white">Are You sure,You want to Delete ?</h4>
        </div>
        <input type="hidden" name="delete_order" id="delete_order">
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
            $(document).on('click','.deleteOrder',function(){
                var userID=$(this).attr('order-id');
                $('#id').val(userID); 
                $('#deleteDomesticWorker').modal('show'); 
            });
                
                $('button[data-toggle = "modal"]').click(function(){
                var order_delete = $(this).parents('tr').children('td').eq(1).text();
                document.getElementById('delete_order').setAttribute("Value", order_delete);
                });
        </script>
    </body>
</html>
