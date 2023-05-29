<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8" />
    <title>Applicant Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Ecommerce Project" name="description" />
    <meta content="S.M. Arifuzzaman" name="author" />
    <meta content="{{ csrf_token() }}" name="csrf_token">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('images/admin/favicon.ico')}}">

    <!-- DataTables -->
    <link href="{{ asset('libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{asset('libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<!-- Begin page -->
<div id="layout-wrapper">

    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Applicant Form</h4>
                            <form action="{{ route('app_update', ['id' => $e_data->id]) }}" method="POST" id="sliderForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">
                                        Name
                                        <span class="text-danger me-1">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input class="form-control summernote" name="app_name" value="{{ $e_data->app_name }}" id="sliderDescription" placeholder="Enter Your Name"/>
                                        @if($errors->has('app_name'))
                                            <span class="error" id="sliderDescriptionError">{{ $errors->first('app_name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">
                                        Email
                                        <span class="text-danger me-1">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="email" name="app_email" value="{{ $e_data->app_email }}" id="buttonText" class="form-control" placeholder="Enter Your Email" required/>
                                        <span class="error" id="buttonTextError">{{$errors->has('app_email') ? $errors->first('app_email') : ' ' }}</span>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">
                                        Image
                                        <span class="text-danger me-1">*</span>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="file" name="app_image" id="sliderImage" onchange="loadFile(event)" class="form-control"/>
                                        <img class="mt-3 w-50" src="{{ asset($e_data->app_image) }}" id="output" alt="">
                                        @if($errors->has('app_image'))
                                            <span class="error" id="sliderImageError">{{ $errors->first('app_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label class="col-sm-3 col-form-label">
                                        Gender
                                        <span class="text-danger me-1">*</span>
                                    </label>
                                    <div class="col-sm-6">
                                        <label class="col-sm-3" for="gender">
                                            <input type="radio" class="" {{ $e_data->app_gender === 1 ? 'checked' : '' }} name="app_gender" value="1"/>
                                            Male
                                        </label>
                                        <label class="col-sm-3" for="gender">
                                            <input type="radio" class="" {{ $e_data->app_gender === 2 ? 'checked' : '' }} name="app_gender" value="2"/>
                                            Female
                                        </label>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-3 col-form-label">
                                        <label>Skills</label>
                                    </div>
                                    <div class="col-sm-6 col-form-label">
                                        <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="laravel"> Laravel</label>
                                        <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="PHP"> Codeigniter</label>
                                        <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="ajax"> Ajax</label>
                                        <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="vue"> Vue Js</label>
                                        <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="mysql"> MySQL</label>
                                        <label class="col-sm-3"><input type="checkbox" name="app_skills[]" value="api"> API</label>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-outline-success w-md px-5 me-1" id="sliderBtn">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end card body -->
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- container-fluid -->
        </div>
    </div>
    <!-- end main content-->
</div>


<!-- JAVASCRIPT -->
<script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
<!-- Custom js -->
<script src="{{asset('js/pages/custom-form-validation.js')}}"></script>

<script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('libs/select2/js/select2.min.js')}}"></script>

<!-- apexcharts -->
<script src="{{asset('libs/apexcharts/apexcharts.min.js')}}"></script>
<!-- Required datatable js -->
<script src="{{asset('libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<!-- Buttons examples -->
<script src="{{asset('libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- Responsive examples -->
<script src="{{asset('libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{asset('js/pages/datatables.init.js')}}"></script>
<!-- dashboard init -->
<script src="{{asset('js/pages/dashboard.init.js')}}"></script>


<!-- App js -->
<script src="{{ asset('/libs/parsleyjs/parsley.min.js') }}"></script>
<script src="{{ asset('/js/pages/form-validation.init.js') }}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{ asset('js/pages/toastr.min.js') }}"></script>
<script src="{{ asset('js/pages/ajax-request.js') }}"></script>

<script>
    $(document).ready(function () {$("#datatable").DataTable()});
    @if(Session::has('message'))
        toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": true,
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch (type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break
    }
    @endif
</script>






</body>

</html>
