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
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                    <form class="mt-4" action="/passportmodule/save-dw-info/{{request()->route()->dw_id}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" name="domestic_worker_id" value="{{request()->route()->dw_id}}">
                                                <input type="hidden" name="created_by" value="{{auth()->user()->id}}">
                                                <div class="mb-3">
                                                <label for="dw_nin">Domestic Worker Nin</label>
                                                    <input type="text" class="form-control" name="dw_nin"
                                                        placeholder="" value="{{$dw_nin}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                <label for="parent_nin">Parent Nin</label>
                                                    <input type="text" class="form-control" name="parent_nin"
                                                        placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                <label for="nok_nin">NOK Nin</label>
                                                    <input type="text" class="form-control" name="nok_nin"
                                                        placeholder="" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                <label for="passport_number">Enter Passport Number<span style="color:red;">(If this field is Empty)</span></label>
                                                    <input type="text" class="form-control" name="passport_number" value="{{$dw_passport_nummber}}"
                                                        placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                <label for="dw_cv">Domestic Worker Curriculum Vitae</label>
                                                    <input type="file" class="form-control dropify"  data-max-file-size="4M" name="dw_cv"
                                                        placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <label for="passport">Passport</label>
                                                <div class=" mb-3">
                                                    <input type="file" class="form-control dropify"  data-max-file-size="4M" name="passport"
                                                        placeholder="" required>
                                                </div>
                                            </div>
                                            
                                            <div class="col-12">
                                                <div class="d-md-fle align-items-center mt-3">
                                                    <div class="ms-aut mt-3 mt-md-0">
                                                        <a href="/passportmodule/domestic-workers-with-passport"  class="btn btn-primary text-white">Back</a>
                                                        <button type="submit" class="btn btn-info text-white">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                    </form>
                                </div>
                                <div class="col-lg-2"></div>
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
        <script src="{{ asset('admin/dist/js/dropify.min.js')}}"></script>
         <script>
            $(document).ready(function() {
                // Basic
                $('.dropify').dropify();

                // Translated
                $('.dropify-fr').dropify({
                    messages: {
                        default: 'Glissez-déposez un fichier ici ou cliquez',
                        replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                        remove: 'Supprimer',
                        error: 'Désolé, le fichier trop volumineux'
                    }
                });

                // Used events
                var drEvent = $('#input-file-events').dropify();

                drEvent.on('dropify.errors', function(event, element) {
                    console.log('Has Errors');
                });

                var drDestroy = $('#input-file-to-destroy').dropify();
                drDestroy = drDestroy.data('dropify')
                $('#toggleDropify').on('click', function(e) {
                    e.preventDefault();
                    if (drDestroy.isDropified()) {
                        drDestroy.destroy();
                    } else {
                        drDestroy.init();
                    }
                })
            });
        </script>
    </body>
</html>