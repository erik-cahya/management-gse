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
            <div class="col-xxl-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class=".card-title">Pemeriksaan Kendaraan</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="row">

                                <x-form.input className="col-md-6 mb-3" type="text" name="no_sticker" label="Nomor Stiker Angkasa Pura" value="{{ $dataCheckup->no_stikcker }}" disabled />
                                <x-form.input className="col-md-6 mb-3" type="text" name="no_sticker" label="Jenis Kendaraan" value="{{ $dataCheckup->vehicle_type }}" disabled />
                                <x-form.input className="col-md-6 mb-3" type="text" name="no_sticker" label="NOPOL/NOLAM" value="{{ $dataCheckup->vehicle_number }}" disabled />
                                <x-form.input className="col-md-6 mb-3" type="text" name="no_sticker" label="Perusahaan" value="{{ $dataCheckup->company }}" disabled />
                                <x-form.input className="col-md-6 mb-3" type="text" name="no_sticker" label="Petugas Pemeriksa" value="{{ $dataCheckup->staff_auditor }}" disabled />
                            </div>

                            <table id="scroll-horizontal-datatable" class="w-100 nowrap table-bordered table text-uppercase table-sm fs-12">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pemeriksaan</th>
                                        <th>Kondisi</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody class="text-capitalize">
                                    @foreach ($dataCheckup->reports as $dtReport)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $dtReport->listCheckups->list_name }}</td>
                                            <td>{{ $dtReport->result }}</td>
                                            <td>{{ $dtReport->information ?? '-' }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
