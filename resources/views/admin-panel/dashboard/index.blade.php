@extends('admin-panel.layouts.app')
@push('style')
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">
@endpush
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row mb-1">
                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h6>Total GSE</h6>
                            <h3>{{ $totalGse }} GSE</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h6>GSE Aktif</h6>
                            <h3 class="text-success">{{ $gseAktif }} GSE</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h6>GSE Tidak Aktif</h6>
                            <h3 class="text-danger">{{ $gseTidakAktif }} GSE</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h6>Total Pelanggaran</h6>
                            <h3>{{ $totalViolation }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-md-4">
                    <div class="alert alert-purple">
                        <strong>All Time</strong><br>
                        {{ $totalViolation }} Pelanggaran
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="alert alert-info">
                        <strong>Bulan Ini</strong><br>
                        {{ $monthlyViolation }} Pelanggaran
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="alert alert-danger">
                        <strong>Hari Ini</strong><br>
                        {{ $dailyViolation }} Pelanggaran
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header fw-bold">
                    Jenis GSE Berdasarkan Maskapai
                </div>
                <div class="card-body">
                    <table class="table-bordered table-sm table">
                        <thead>
                            <tr>
                                <th>Maskapai</th>
                                <th>Jenis GSE</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gseByCompanyAndType as $row)
                                <tr>
                                    <td>{{ $row->company_name ?? '-' }}</td>
                                    <td>{{ $row->type_name ?? '-' }}</td>
                                    <td>{{ $row->total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

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
