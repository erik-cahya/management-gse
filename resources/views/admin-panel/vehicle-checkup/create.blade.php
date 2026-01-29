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
                    <form action="{{ route('checkup.store') }}" method="POST">
                        @csrf
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

                                <div class="col-12">
                                    <div class="card-body" bis_skin_checked="1">
                                        <div class="row">
                                            @foreach ($listingCheck as $list)
                                                <div class="col-6">
                                                    <div class="card border-secondary border-secondary gap-2 border">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-dark">{{ $loop->iteration }}. {{ $list->list_name }}</h5>
                                                            <div class="d-flex mt-2" bis_skin_checked="1">
                                                                <div class="form-check form-check-inline" bis_skin_checked="1">
                                                                    <input type="radio" id="baik_check_{{ $list->checkup_list_id }}" name="checkup_list_id[{{ $list->checkup_list_id }}]" value="baik" class="form-check-input">
                                                                    <label class="form-check-label fw-normal" for="baik_check_{{ $list->checkup_list_id }}">Baik</label>
                                                                </div>
                                                                <div class="form-check form-check-inline" bis_skin_checked="1">
                                                                    <input type="radio" id="tidak_check_{{ $list->checkup_list_id }}" name="checkup_list_id[{{ $list->checkup_list_id }}]" value="tidak baik" class="form-check-input">
                                                                    <label class="form-check-label fw-normal" for="tidak_check_{{ $list->checkup_list_id }}">Tidak Baik</label>
                                                                </div>
                                                            </div>
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
