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
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        @include('layouts.messages')
                        <div class="card">
                            <div class="card-body">
                            @foreach($dw_info as $edit_info)
                                <form action="/registramodule/update-dw-info/{{request()->route()->dw_id}}" method="get">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="nationa_id_number" value="{{$edit_info->nationa_id_number}}" id="nationa_id_number"
                                                    placeholder="">
                                                <label for="nationa_id_number">NIN</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="desired_job" value="{{$edit_info->desired_job}}" id="desired_job"
                                                    placeholder="">
                                                <label for="desired_job">Desired Job</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="parent_names" value="{{$edit_info->parent_names}}" id="parent_names"
                                                    placeholder="">
                                                <label for="parent_names">Parents Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="education_level" value="{{$edit_info->education_level}}" id="parent_names"
                                                    placeholder="">
                                                <label for="education_level">Education Level</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="other_skills" value="{{$edit_info->other_skills}}" id="parent_names"
                                                    placeholder="">
                                                <label for="other_skills">Other Skills</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control" name="office_or_premedical_fee" value="{{$edit_info->office_or_premedical_fee}}" id="office_or_premedical_fee"
                                                    placeholder="">
                                                <label for="office_or_premedical_fee">Office and Premedical</label>
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="amount_in_words" value="{{$edit_info->amount_in_words}}"
                                                        placeholder="">
                                                    <label for="amount_in_words">Amount in Words</label>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="reason_for_payment"  value="{{$edit_info->reason_for_payment}}"
                                                        placeholder="">
                                                    <label for="reason_for_payment">Reason For Payment</label>
                                            </div>
                                            </div>
                                        <div class="col-12">
                                            <div class="d-md-fle align-items-center mt-3">
                                                <div class="ms-aut mt-3 mt-md-0">
                                                <a href="/registramodule/new-domestic-workers" button type="button" class="btn btn-primary text-white">Back</button></a>
                                                    <button type="submit" class="btn btn-info text-white">Submit Changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
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