@extends('admin-panel.layouts.app')
@push('style')
    <!-- Datatables css -->
    {{-- <link href="{{ asset('admin') }}/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" /> --}}

    <link href="{{ asset('admin') }}/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin') }}/assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=".card-title">Buat Data Checkup Kendaraan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <x-form.input className="col-md-4 mb-3" type="text" name="no_sticker" label="Nomor Stiker Angkasa Pura" value="{{ old('no_sticker') }}" />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="vehicle_type" label="Jenis Kendaraan" value="{{ old('vehicle_type') }}" />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="vehicle_number" label="NOPOL/NOLAM" value="{{ old('vehicle_number') }}" />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="company" label="Perusahaan" value="{{ old('company') }}" />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="staff_auditor" label="Petugas Pemeriksa" value="{{ old('staff_auditor') }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
