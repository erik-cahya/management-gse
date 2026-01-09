@extends('admin-panel.layouts.app')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">
@endpush
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-4">
                    <div class="card border-top-0 overflow-hidden">
                        <div class="progress progress-sm rounded-0 bg-light" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-primary" style="width: 90%"></div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">
                                    <p class="text-muted fw-semibold fs-16 mb-1">Total GSE</p>
                                    <p class="text-muted mb-4">

                                        Jumlah Asset
                                    </p>
                                </div>
                                <div class="avatar-sm mb-4">
                                    <div class="avatar-title bg-primary-subtle text-primary fs-24 rounded">
                                        <i class="bi bi-receipt"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-lg-nowrap justify-content-between align-items-end flex-wrap">
                                <h3 class="d-flex mb-0"><i class="bi bi-currency-dollar"></i>1,226.71k </h3>
                                <div class="d-flex align-items-end h-100">
                                    <div id="daily-orders" data-colors="#007aff"></div>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4">
                    <div class="card border-top-0 overflow-hidden">
                        <div class="progress progress-sm rounded-0 bg-light" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-dark" style="width: 40%"></div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">
                                    <p class="text-muted fw-semibold fs-16 mb-1">Pelanggaran GSE</p>
                                    <p class="text-muted mb-4">Total Pelanggaran GSE
                                    </p>
                                </div>
                                <div class="avatar-sm mb-4">
                                    <div class="avatar-title bg-dark-subtle text-dark fs-24 rounded">
                                        <i class="bi bi-people"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-lg-nowrap justify-content-between align-items-end flex-wrap">
                                <h3 class="d-flex mb-0"><i class="bi bi-person"></i> 1,226.71k </h3>
                                <div class="d-flex align-items-end h-100">
                                    <div id="new-leads-chart" data-colors="#404040"></div>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col -->

                <div class="col-xl-4">
                    <div class="card border-top-0 overflow-hidden">
                        <div class="progress progress-sm rounded-0 bg-light" role="progressbar" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-danger" style="width: 60%"></div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">
                                    <p class="text-muted fw-semibold fs-16 mb-1">Pelanggaran Hari Ini </p>
                                    <p class="text-muted mb-4">

                                        Jumlah Pelanggaran per Hari Ini
                                    </p>
                                </div>
                                <div class="avatar-sm mb-4">
                                    <div class="avatar-title bg-danger-subtle text-danger fs-24 rounded">
                                        <i class="bi bi-clipboard-data"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-lg-nowrap justify-content-between align-items-end flex-wrap">
                                <h3 class="d-flex mb-0"><i class="bi bi-currency-dollar"></i>12,029.71k </h3>
                                <div class="d-flex align-items-end h-100">
                                    <div id="booked-revenue-chart" data-colors="#bb3939"></div>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

        </div>
        <!-- end container -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 text-center">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © Techmin - Theme by <b>Techzaa</b>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>
@endsection
@push('script')
    <!-- Apex Charts js -->
    <script src="{{ asset('admin') }}/assets/vendor/apexcharts/apexcharts.min.js"></script>

    <!-- Vector Map js -->
    <script src="{{ asset('admin') }}/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Dashboard App js -->
    <script src="{{ asset('admin') }}/assets/js/pages/dashboard.js"></script>
@endpush
