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
                                            <form action="/premedicalmodule/search-dw" method="get">
                                            @csrf
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="dw_contact" placeholder="Search Worker Contact" aria-label="" aria-describedby="basic-addon1">
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
                                                <tr style="text-transform: capitalize">
                                                    <th>#</th>
                                                    <th>NAME</th>
                                                    <th>Workers Contact</th>
                                                    <th>Passport No.</th>
                                                    <th>Nok Contact</th>
                                                    <th>Agent Contact</th>
                                                    <th>Reason</th>
                                                    <th>CREATED AT</th>
                                                    <th>CREATED BY</th>
                                                    <th>View More</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($all_domestic_workers as $i=>$dw_registered_today)
                                                        <tr>
                                                        @php
                                                            if( $all_domestic_workers->currentPage() == 1){
                                                                $i = $i+1;
                                                            }else{
                                                                $i = ($i+1) + 10*($all_domestic_workers->currentPage()-1);
                                                            }
                                                        @endphp
                                                            <td>{{$i}}</td>
                                                            <td>{{$dw_registered_today->dw_first_name}} {{$dw_registered_today->dw_last_name}} {{$dw_registered_today->dw_other_name}}</td>
                                                            <td>{{$dw_registered_today->dw_contact}}</td>
                                                            <td>{{$dw_registered_today->passport_number}}</td>
                                                            <td>{{$dw_registered_today->nok_contact}}</td>
                                                            <td>{{ $dw_registered_today->phone_number}}</td>
                                                            <td>{{$dw_registered_today->reason_for_coming}}</td>
                                                           {{--<td>
                                                            @if($dw_registered_today->premedical_status == 'pending')
                                                             <span class="label label-danger m-r-10">{{$dw_registered_today->premedical_status}}</span>
                                                            @else
                                                            <span class="label label-info m-r-10">{{$dw_registered_today->premedical_status}}</span>
                                                            @endif
                                                            </td>--}}
                                                            <td>{{$dw_registered_today->created_at}}</td>
                                                            <td>{{$dw_registered_today->name}}</td>
                                                            <td><a href="/recieptionmodule/view-more-dw-info/{{$dw_registered_today->id}}" class="btn btn-info btn-sm">View</a></td>
                                                        </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="text-end ml-2">
                                                {{$all_domestic_workers->links()}}
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
       
    </body>
</html>
