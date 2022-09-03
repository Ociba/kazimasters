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
                                <form action="/search-users" method="get">
                                    @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" name="name" placeholder="Search Username" aria-label="" aria-describedby="basic-addon1">
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
                                            <tr style="text-transform: uppercase">
                                                <th>#</th>
                                                <th>NAME</th>
                                                <th>Email</th>
                                                <th class="text-center">Photo</th>
                                                <th>created at</th>
                                                <th>Created by</th>
                                                @if(in_array('Can view option in  users', auth()->user()->getUserPermisions()))
                                                <th>OPTION</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($get_registered_users as $i =>$users)
                                            <tr>
                                            @php
                                                if( $get_registered_users->currentPage() == 1){
                                                    $i = $i+1;
                                                }else{
                                                    $i = ($i+1) + 10*($get_registered_users->currentPage()-1);
                                                }
                                                $created_by = \DB::table('users')->where('id',$users->created_by)->value('name');
                                            @endphp
                                                <td>{{$i}}</td>
                                                <td hidden>{{$users->id}}</td>
                                                <td>{{$users->name}}</td>
                                                <td>{{$users->email}}</td>
                                                <td class="text-center"><img style="width:60px; height:50px;" src="{{ asset('user_photo/'.$users->profile_photo_path)}}"></td>
                                                <td>{{$users->created_at}}</td>
                                                <td>{{$created_by}}
                                                @if(in_array('Can delete user info permanently', auth()->user()->getUserPermisions()))
                                                <td>
                                                <button class="btn btn-sm btn-danger deleteDW" user-id="" data-toggle="modal" data-target="#deleteDomesticWorker">Delete</button> 
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="text-end ml-2">
                                        {{$get_registered_users->links()}}
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
<div class="modal fade" id="deleteDomesticWorker" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <form action="/delete" method="get">
      <div class="modal-header d-flex justify-content-center bg-danger text-white">
        <h4 class="heading text-white">Are You sure,You want to Delete ?</h4>
        <input type="hidden" name="delete_user" id="delete_user">
      </div>

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
        $(document).on('click','.deleteDW',function(){
            var userID=$(this).attr('user-id');
            $('#id').val(userID); 
            $('#deleteDomesticWorker').modal('show'); 
        });
          $('button[data-toggle = "modal"]').click(function(){
            var dw_delete = $(this).parents('tr').children('td').eq(1).text();
            document.getElementById('delete_user').setAttribute("Value", dw_delete);
            });
            
    </script>
</body>
</html>