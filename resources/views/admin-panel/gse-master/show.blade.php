@extends('admin-panel.layouts.app')
@push('style')
    <!-- Datatables css -->
    <link href="{{ asset('admin') }}/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    {{-- <link href="{{ asset('admin') }}/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('admin') }}/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('admin') }}/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('admin') }}/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href="{{ asset('admin') }}/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" /> --}}
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=".card-title">GSE Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="serial_gse">Serial GSE</label>
                                    <div class="col-md-9">
                                        <input disabled type="text" class="form-control" id="serial_gse" name="serial_gse" value="{{ $dataGse->gse_serial }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="type_gse">Type GSE</label>
                                    <div class="col-md-9">
                                        <input disabled type="text" class="form-control" id="type_gse" name="type_gse" value="{{ $dataGse->gse_type }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="operator">Opeator</label>
                                    <div class="col-md-9">
                                        <input disabled type="text" class="form-control" id="operator" name="operator" value="{{ $dataGse->operator }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="operation_area">Operation Area</label>
                                    <div class="col-md-9">
                                        <input disabled type="text" class="form-control" id="operation_area" name="operation_area" value="{{ $dataGse->operation_area }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="created_at">Ditambahkan</label>
                                    <div class="col-md-9">
                                        <input disabled type="text" class="form-control" id="created_at" name="created_at" value="{{ $dataGse->created_at->format('d M Y | H:i:s') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="updated_at">Diubah</label>
                                    <div class="col-md-9">
                                        <input disabled type="text" class="form-control" id="updated_at" name="updated_at" value="{{ $dataGse->updated_at->format('d M Y | H:i:s') }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3 col-form-label" for="status">Status</label>
                                    <div class="col-md-9">
                                        <div class="alert {{ $dataGse->status === 1 ? 'alert-success' : 'alert-danger' }} d-flex align-items-center" role="alert">
                                            <i class="{{ $dataGse->status === 1 ? 'mdi mdi-check' : 'mdi mdi-alert' }} fs-16 me-1"></i>
                                            <div>{{ $dataGse->status === 1 ? 'Active' : 'Not Active' }}</div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=".card-title">Riwayat GSE</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table id="scroll-horizontal-datatable" class="table-striped w-100 nowrap table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggaran</th>
                                            <th>Jenis Pelanggaran</th>
                                            <th>Level Pelanggaran</th>
                                            <th>Tanggal Pengecekan</th>
                                            <th>Pelapor</th>
                                            <th>Lokasi</th>
                                            <th>Deskripsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataViolations as $pelanggaran)
                                            @php
                                                if ($pelanggaran->violation_level === 'berat') {
                                                    $textClass = 'text-danger';
                                                    $bgClass = 'bg-danger-subtle';
                                                } elseif ($pelanggaran->violation_level === 'sedang') {
                                                    $textClass = 'text-primary';
                                                    $bgClass = 'bg-primary-subtle';
                                                } else {
                                                    $textClass = 'text-success';
                                                    $bgClass = 'bg-success-subtle';
                                                }
                                            @endphp
                                            <tr class="text-capitalize">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pelanggaran->violation_name }}</td>
                                                <td>{{ $pelanggaran->violation_type }}</td>
                                                <td>
                                                    <span class="badge rounded-pill fs-12 {{ $bgClass . ' ' . $textClass }}">{{ $pelanggaran->violation_level }}</span>

                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($pelanggaran->examination_date)->format('d M Y') }}</td>
                                                <td>{{ $pelanggaran->employee }}</td>
                                                <td>{{ $pelanggaran->location }}</td>
                                                <td>{{ $pelanggaran->description }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <!-- Datatables js -->
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>

    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    {{-- <script src="{{ asset('admin') }}/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script> --}}

    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    {{-- <script src="{{ asset('admin') }}/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script> --}}
    {{-- <script src="{{ asset('admin') }}/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script> --}}

    <!-- Datatable Demo App js -->
    <script src="{{ asset('admin') }}/assets/js/pages/datatable.init.js"></script>
@endpush
