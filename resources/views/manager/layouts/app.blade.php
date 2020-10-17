<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>{{ setting('app_title','KUBPRO') }} - @yield('title', 'APP')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Rauf Abbas" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- CSRF Token -->
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">


    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}">

    <!-- Plugins css -->
    @stack('css')
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert-->
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Jquery Toast css -->
    <link href="{{ asset('assets/libs/jquery-toast-plugin/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{asset('assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"  disabled />

    <!-- icons -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- style -->
    @stack('styles')
    <style>
        a {
            color: #2e2e2f;
            text-decoration: none;
            background-color: transparent;
        }
        a:hover {
            color: #2e2e2f;
            text-decoration: none;
        }
        .btn-tbl {
            padding: 0.01rem .3rem;
            font-size: 0.1rem;
            border-radius: .15rem;
        }
        .table thead th {
            vertical-align: bottom;
             border-bottom: 0px solid #dee2e6;
        }
        .cke_reset {
            border-radius: 5px;
        }
        .cke_top {
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .cke_bottom {

            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        .is-invalid #cke_ckEditor{
            border-color: #f1556c!important;
        }
    </style>
</head>

<body class="loading" data-layout='{"sidebar": { "color": "dark"}}'>

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    @include('manager.particles._topbar')
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    @include('manager.particles._left_sidebar')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row justify-content-center">

                    <div class="@yield('hedar-col','col-10')">
                        <div class="page-title-box">
                            <div class="page-title-right">
                                @stack('page-title-right')
                            </div>
                            <h4 class="page-title">@yield('title','APP')</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        @yield('content','CONTENT')
                    </div>
                </div>
                <!-- end page title -->

            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        @include('manager.particles._footer')
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->


<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js') }}"></script>

<!-- Plugins js-->
@stack('script')
<script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
<!-- Sweet Alerts js -->
<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Tost-->
<script src="{{ asset('assets/libs/jquery-toast-plugin/jquery.toast.min.js') }}"></script>

<script src="{{ asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/libs/autonumeric/autoNumeric-min.js') }}"></script>

<script src="{{ asset('assets/js/pages/form-masks.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/actions.js') }}"></script>

@include('manager.common.notify')

{{--<script>--}}

{{--    // $.toast({--}}
{{--    //     text: 'Loaders are enabled by default. Use `loader`, `loaderBg` to change the default behavior',--}}
{{--    //     icon: 'info',--}}
{{--    //     loader: true,        // Change it to false to disable loader--}}
{{--    //     loaderBg: '#9EC600',  // To change the background,--}}
{{--    //     position: 'bottom-right'--}}
{{--    // })--}}
{{--    // $.toast({--}}
{{--    //     heading: 'How to contribute?!',--}}
{{--    //     text: [--}}
{{--    //         'Fork the repository',--}}
{{--    //         'Improve/extend the functionality',--}}
{{--    //         'Create a pull request'--}}
{{--    //     ],--}}
{{--    //     icon: 'info'--}}
{{--    // })--}}
{{--</script>--}}
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@stack('scripts')
</body>
</html>
