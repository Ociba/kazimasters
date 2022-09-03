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
                                 <div class="col-lg-4 text-center">
                                 @foreach($get_users as $user)
                                 <span class="text-info font-weight-900">Assign Permission (s) To {{$user->name}}</span>
                                 </div>
                                 <div class="col-lg-4 text-end">
                                 </div>
                                 @endforeach
                                 <div class="col-lg-2">
                                 </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-2"></div>
                           <div class="col-lg-8">
                                <form class="form-horizontal mt-3" action="/assign-permissions/{{request()->route()->user_id}}" method="get">
                                            @csrf
                                            <div class="table-responsive">
                                            <input type="hidden" name="user_id" value="{{request()->route()->user_id}}">
                                             <table class="table">
                                                    <thead>
                                                        <tr class="text-uppercase">
                                                            <th class=""><input type="checkbox" id="select_all"/> Select All The Permissions or one By One</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-muted">
                                                       @foreach($get_permission as $i=>$permission)
                                                        <tr>
                                                        @php
                                                            if( $get_permission->currentPage() == 1){
                                                                $i = $i+1;
                                                            }else{
                                                                $i = ($i+1) + 10*($get_permission->currentPage()-1);
                                                            }
                                                        @endphp
                                                            <td>{{$i}} <input type="checkbox" class="checkbox checkbox-primary" name="user_permisions[]" value="{{$permission->id}}" /> {{$permission->permission}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="col-12 mb-3">
                                                    <button type="button" class="btn btn-warning mr-1"><a href="/user-and-permissions/{{request()->route()->user_id}}" style="color:white;">Back</a></button>
                                                    
                                                    <button type="submit" class="btn btn-primary ">Save</button>
                                                </div>
                                            </div>
                                            </form>
                                    </div>
                                    <div class="row">
                                    <div class="col-12 offset-2">
                                    {{$get_permission->links()}}
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
        <script type="text/javascript">
            $(document).ready(function(){
                $('#select_all').on('click',function(){
                    if(this.checked){
                        $('.checkbox').each(function(){
                            this.checked = true;
                        });
                    }else{
                        $('.checkbox').each(function(){
                            this.checked = false;
                        });
                    }
                });
                $('.checkbox').on('click',function(){
                    if($('.checkbox:checked').length == $('.checkbox').length){
                        $('#select_all').prop('checked',true);
                    }else{
                        $('#select_all').prop('checked',false);
                    }
                });
            });
        </script>
    </body>
</html>
