<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard | Techmin - Bootstrap 5 Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully responsive admin theme which can be used to build CRM, CMS,ERP etc." name="description" />
    <meta content="Techzaa" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin') }}/assets/images/favicon.ico">
    <!-- App css -->
    <link href="{{ asset('admin') }}/assets/css/app.css" rel="stylesheet" type="text/css" id="app-style" />
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme Config Js -->
    <script src="{{ asset('admin') }}/assets/js/config.js"></script>
    <!-- Icons css -->
    <link href="{{ asset('admin') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />

    {{-- SweetAlert --}}
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.26.17/dist/sweetalert2.min.css " rel="stylesheet">

    @stack('style')

    <!-- Daterangepicker css -->
    {{-- <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/daterangepicker/daterangepicker.css"> --}}

</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">

        <!-- ========== Header ========== -->
        @include('admin-panel.layouts.header')

        <!-- ========== Sidebar ========== -->
        @include('admin-panel.layouts.sidebar')

        <!-- ========== Content ========== -->
        <div class="content-page">

            <!-- content -->
            @yield('content')

            <!-- Footer -->
            @include('admin-panel.layouts.footer')
        </div>

    </div>

    <!-- Theme Settings -->
    @include('admin-panel.layouts.setting')

    <!-- Vendor js -->
    <script src="{{ asset('admin') }}/assets/js/vendor.min.js"></script>
    <!-- App js -->
    <script src="{{ asset('admin') }}/assets/js/app.min.js"></script>

    <script src="{{ asset('admin') }}/assets/vendor/lucide/umd/lucide.min.js"></script>

    @stack('script')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        @if (session('flashData'))
            var flashData = @json(session('flashData'));

            Swal.fire({
                title: flashData.title,
                text: flashData.message,
                icon: flashData.swalFlashIcon,
                confirmButtonText: 'OK'
            });
        @endif
    </script>

</body>

</html>
