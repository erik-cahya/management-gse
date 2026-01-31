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
                    <form action="{{ route('checkup.update', $dataCheckup->vehicle_checkup_id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <x-form.input className="col-md-4 mb-3" type="text" name="no_sticker" label="Nomor Stiker Angkasa Pura" value="{{ old('no_sticker', $dataCheckup->no_sticker) }}" />
                                        <x-form.input className="col-md-4 mb-3" type="text" name="vehicle_type" label="Jenis Kendaraan" value="{{ old('vehicle_type', $dataCheckup->vehicle_type) }}" />
                                        <x-form.input className="col-md-4 mb-3" type="text" name="vehicle_number" label="NOPOL/NOLAM" value="{{ old('vehicle_number', $dataCheckup->vehicle_number) }}" />
                                        <x-form.input className="col-md-4 mb-3" type="text" name="company" label="Perusahaan" value="{{ old('company', $dataCheckup->company) }}" />
                                        <x-form.input className="col-md-4 mb-3" type="text" name="staff_auditor" label="Petugas Pemeriksa" value="{{ old('staff_auditor', $dataCheckup->staff_auditor) }}" />
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="card-body" bis_skin_checked="1">
                                        <div class="row">
                                            @foreach ($checkupList as $list)
                                                @php
                                                    $result = $checkupResults[$list->checkup_list_id] ?? null;
                                                @endphp

                                                <div class="col-6">
                                                    <div class="card border-secondary mb-2">
                                                        <div class="card-body">

                                                            <h5>{{ $list->list_name }}</h5>

                                                            <div class="form-check form-check-inline">
                                                                <input type="radio"
                                                                    name="checkup_list_id[{{ $list->checkup_list_id }}]"
                                                                    value="baik"
                                                                    @checked(optional($result)->result === 'baik')>

                                                                <label class="form-check-label">Baik</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input type="radio"
                                                                    name="checkup_list_id[{{ $list->checkup_list_id }}]"
                                                                    value="tidak baik"
                                                                    @checked(optional($result)->result === 'tidak baik')>

                                                                <label class="form-check-label">Tidak Baik</label>
                                                            </div>

                                                            <textarea
                                                                name="keterangan[{{ $list->checkup_list_id }}]"
                                                                class="form-control mt-2"
                                                                placeholder="Keterangan (optional)">{{ old("keterangan.$list->checkup_list_id", optional($result)->information) }}</textarea>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
