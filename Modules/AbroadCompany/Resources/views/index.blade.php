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
                                                    <th>NAME OF COMPANY</th>
                                                    <th>Created at</th>
                                                    @if(in_array('Can view companies abroad option', auth()->user()->getUserPermisions()))
                                                    <th>OPTIONS</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($get_abroad_companies as $i=>$company)
                                                <tr>
                                                @php
                                                    if( $get_abroad_companies->currentPage() == 1){
                                                        $i = $i+1;
                                                    }else{
                                                        $i = ($i+1) + 10*($get_abroad_companies->currentPage()-1);
                                                    }
                                                @endphp
                                                    <td>{{$i}}</td>
                                                    <td hidden>{{$company->id}}</td>
                                                    <td>{{$company->name}}</td>
                                                    <td>{{$company->created_at}}</td>
                                                    @if(in_array('Can edit company abroad info', auth()->user()->getUserPermisions()))
                                                    <td class="text-nowrap" style="width:10px">
                                                        <a href="/abroadcompany/edit-abroadcompany/{{$company->id}}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-original-title="Edit"> Edit</a>
                                                        @endif
                                                        @if(in_array('Can trash company abroad info', auth()->user()->getUserPermisions()))
                                                        <button class="btn btn-sm btn-danger deleteCompany" company-id="" data-toggle="modal" data-target="#deleteDomesticWorker">Delete</button>
                                                        
                                                    </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                    <div class="col-lg-4">
                                        {{$get_abroad_companies->links()}}
                                    </div>
                                    <div class="col-lg-4"></div>
                                    <div class="col-lg-4 text-end ml-2">
                                        <a href="/abroadcompany/add-abroad-company" class="btn btn-info add-new text-end"><i class="fa fa-plus"></i> Add New Company</a>
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
        <form action="/abroadcompany/trash-abroad-company" method="get">
        <div class="modal-header d-flex justify-content-center bg-danger text-white">
            <h4 class="heading text-white">Are You sure,You want to Delete ?</h4>
        </div>
        <input type="hidden" name="delete_company" id="delete_company">
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
            $(document).on('click','.deleteCompany',function(){
                var userID=$(this).attr('company-id');
                $('#id').val(userID); 
                $('#deleteDomesticWorker').modal('show'); 
            });
                
                $('button[data-toggle = "modal"]').click(function(){
                var company_delete = $(this).parents('tr').children('td').eq(1).text();
                document.getElementById('delete_company').setAttribute("Value", company_delete);
                });
        </script>
    </body>
</html>
