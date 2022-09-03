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
                                <form action="/cv/search-dw-nin" method="get">
                                  @csrf
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="dw_nin" placeholder="Search DW NIN" aria-label="" aria-describedby="basic-addon1">
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
                                                <th>DW Name</th>
                                                <th>DW Contact</th>
                                                <th>DW Nin</th>
                                                <th>Parent Nin</th>
                                                <th>NOK Nin</th>
                                                <th>NOK Contact</th>
                                                <th>DW CV</th>
                                                <th>Created at</th>
                                                <th>created by</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($get_dw_cv as $i=>$cv)
                                            <tr>
                                                @php
                                                    if( $get_dw_cv->currentPage() == 1){
                                                        $i = $i+1;
                                                    }else{
                                                        $i = ($i+1) + 10*($get_dw_cv->currentPage()-1);
                                                    }
                                                @endphp
                                                <td>{{$i}}</td>
                                                <td>{{$cv->dw_first_name}} {{$cv->dw_last_name}} {{$cv->dw_other_name}} </td>
                                                <td>{{$cv->dw_contact}}</td>
                                                <td>{{$cv->dw_nin}}</td>
                                                <td>{{$cv->parent_nin}}</td>
                                                <td>{{$cv->nok_nin}}</td>
                                                <td>{{$cv->nok_contact}}</td>
                                                <td><a href="{{ asset('dw_cvs/'.$cv->dw_cv)}}" style="color:blue;" target="_blank">view cv</a></td>
                                                <td>{{$cv->created_at}}</td>
                                                <td>{{$cv->name}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                <div class="text-end ml-2">
                                   {{$get_dw_cv->links()}}
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