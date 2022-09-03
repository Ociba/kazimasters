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
                                    <form class="mt-4" action="/otherreports/save-other-report/{{request()->route()->dw_id}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                <input type="hidden" name="dw_at_other_reports_level_id" id="" value="{{request()->route()->dw_id}}">
                                                <input type="hidden" name="created_by" value="{{auth()->user()->id}}">
                                                    <label for="vcs_passport_payment">VCS Passport Payment</label>
                                                    <input type="file" class="form-control dropify"  data-max-file-size="4M" name="vcs_passport_payment"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="gcc_payment">Gcc Payment</label>
                                                    <input type="file" class="form-control dropify"  data-max-file-size="4M" name="gcc_payment" placeholder="">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="visa_attachment">Visa Attachment</label>
                                                    <input type="file" class="form-control dropify"  data-max-file-size="4M" name="visa_attachment"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="ticket_copy">Ticket Copy</label>
                                                    <input type="file" class="form-control dropify"  data-max-file-size="4M" name="ticket_copy"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="passport_copy">PassPort Copy</label>
                                                    <input type="file" class="form-control dropify"  data-max-file-size="4M" name="passport_copy"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="pcr_test_result">PCR Test Results</label>
                                                    <input type="file" class="form-control dropify"  data-max-file-size="4M" name="pcr_test_result"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="ministry_clearance_letter">Ministry Clearance Letter</label>
                                                    <input type="file" class="form-control dropify"  data-max-file-size="4M" name="ministry_clearance_letter"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3">
                                                    <label for="yellow_book">Yellow Book (Yellow Fever)</label>
                                                    <input type="file" class="form-control dropify"  data-max-file-size="4M" name="yellow_book"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label for="covid">Covid</label>
                                                    <input type="file" class="form-control dropify"  data-max-file-size="4M" name="covid"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label for="departure_medical">Departure Medical</label>
                                                    <input type="file" class="form-control dropify"  data-max-file-size="4M" name="departure_medical"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label for="training_certificate">Training Certificate</label>
                                                    <input type="file" class="form-control dropify"  data-max-file-size="4M" name="training_certificate"
                                                        placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-md-fle align-items-center mt-3">
                                                    <div class="ms-aut mt-3 mt-md-0">
                                                        <a href="/otherreports/successful-dw" button type="button" class="btn btn-primary text-white">Back</button></a>
                                                        <button type="submit" class="btn btn-info text-white">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                    </form>
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