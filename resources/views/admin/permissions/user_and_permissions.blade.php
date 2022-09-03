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
                            <div class="row">
                                 <div class="col-lg-2">
                                 </div>
                                 <div class="col-lg-4">
                                 @foreach($get_user_and_permissions as $user)
                                 <span class="text-info">{{$user->name}}</span>
                                 </div>
                                 <div class="col-lg-4 text-end">
                                 <a href="/get-users" class="btn btn-warning btn-sm">Back </a>
                                 <a href="/add-permissions/{{$user->id}}" class="btn btn-info btn-sm">Add Permission (s) </a>
                                 </div>
                                 @endforeach
                                 <div class="col-lg-2">
                                 </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-2"></div>
                           <div class="col-lg-8">
                           <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Permission</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($get_permissions_for_this_user as $i=>$permission)
                                            <tr>
                                                @php
                                                    if( $get_permissions_for_this_user->currentPage() == 1){
                                                        $i = $i+1;
                                                    }else{
                                                        $i = ($i+1) + 10*($get_permissions_for_this_user->currentPage()-1);
                                                    }
                                                @endphp
                                                <td>{{$i}}</td>
                                                <td>{{$permission->permission}}</td>
                                                <td><a href="/unassign-permission/{{$permission->id}}" class="btn btn-sm btn-info">Remove Permission</a> </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                    <div class="row">
                                    <div class="text-end ml-2">
                                    {{$get_permissions_for_this_user->links()}}
                                    </div>
                                    </div>
                                    <div class="col-lg-2"></div></div>
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
