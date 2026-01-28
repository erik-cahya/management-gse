@extends('admin-panel.layouts.app')
@push('style')
    <!-- Datatables css -->
    <link href="{{ asset('admin') }}/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">

                    <div class="card border-primary border">
                        <div class="card-header text-bg-primary">
                            <h4 class="card-title text-uppercase">A. Data GSE</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="Nomor Serial GSE" value="{{ $violator->gseData->gse_serial ?? '-' }}" disabled />
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="Nomor Asset/Inventory" value="{{ $violator->gseData->asset_number ?? '-' }}" disabled />
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="Nopol Kendaraan" value="{{ $violator->gseData->vehicle_number ?? '-' }}" disabled />
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="Perusahaan" value="{{ $violator->gseData->companies->company_name ?? '-' }}" disabled />
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="Type" value="{{ $violator->gseData->types->type_name ?? '-' }}" disabled />
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="Kategori" value="{{ $violator->gseData->categories->category_name ?? '-' }}" disabled />
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="Tahun Manufaktur" value="{{ $violator->gseData->manufacture_year ?? '-' }}" disabled />
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="Status GSE" value="{{ $violator->gseData->status == 1 ? 'Active' : 'Deactive' ?? '-' }}" disabled />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="card border-primary border">
                        <div class="card-header text-bg-primary">
                            <h4 class="card-title text-uppercase">B. Data Pelanggaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="Nama Pelanggar" value="{{ $violator->full_name ?? '-' }}" disabled />
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="Tanggal & Waktu Kejadian" value="{{ $violator->violationReports->incident_date ?? '-' }} | {{ $violator->violationReports->incident_time }}" disabled />
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="Instansi Perusahaan Pelanggar" value="{{ $violator->company_name ?? '-' }}" disabled />
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="No. Pas Bandara/Area/Valid" value="{{ $violator->airport_pass_number ?? '-' }}" disabled />
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="No. TIM/Jenis/Valid" value="{{ $violator->tim_number ?? '-' }}" disabled />
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="Jenis Lisensi/Rating" value="{{ $violator->license_type ?? '-' }}" disabled />
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="No. Lisensi/Validitas/No. Polisi" value="{{ $violator->vehicle_plate_number ?? '-' }}" disabled />
                                <x-form.input className="col-md-12 mb-3" type="text" name="serial_gse" label="Lokasi Kejadian" value="{{ $violator->violationReports->incident_location ?? '-' }}" disabled />

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">

                    <div class="card border-primary border">
                        <div class="card-header text-bg-primary">
                            <h4 class="card-title text-uppercase">B. Jenis Pelanggaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                @foreach ($violationType as $type)
                                    @php
                                        $detail = $violationChecked[$type->violation_type_id] ?? null;
                                    @endphp

                                    <div class="form-check form-check-inline mb-3">

                                        {{-- TANPA additional --}}
                                        @if ($type->additional_form == 0)
                                            <input type="checkbox" class="form-check-input" disabled style="opacity: 1" {{ $detail ? 'checked' : '' }}>

                                            <label class="form-check-label" style="opacity: 1">
                                                {{ $type->name }}
                                            </label>
                                        @endif

                                        {{-- DENGAN additional --}}
                                        @if ($type->additional_form == 1)
                                            <input type="checkbox" class="form-check-input" disabled style="opacity: 1" {{ $detail ? 'checked' : '' }}>

                                            <label class="form-check-label" style="opacity: 1">
                                                {{ $type->name }}
                                            </label>

                                            <input type="text" class="form-control mt-1" value="{{ $detail?->additional_note }}" readonly>
                                        @endif

                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-primary border">
                        <div class="card-header text-bg-primary">
                            <h4 class="card-title text-uppercase">D. Sanksi</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <span class="fst-italic fs-14 mb-3">
                                    Selanjutnya kepada Pelanggar diberikan sanksi berupa :
                                </span>

                                @foreach ($dataSanction as $sanction)
                                    @php
                                        $sanctionDetail = $sanctionChecked[$sanction->sanction_id] ?? null;
                                    @endphp

                                    {{-- TANPA additional --}}
                                    @if ($sanction->additional_form === 0)
                                        <div class="col-lg-12">
                                            <div class="form-check form-check-inline mb-2">
                                                <input type="checkbox" class="form-check-input" disabled {{ $sanctionDetail ? 'checked' : '' }}>

                                                <label class="form-check-label" style="opacity: 1">
                                                    {{ $sanction->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                @foreach ($dataSanction as $sanction)
                                    @php
                                        $sanctionDetail = $sanctionChecked[$sanction->sanction_id] ?? null;
                                    @endphp

                                    {{-- DENGAN additional --}}
                                    @if ($sanction->additional_form === 1)
                                        <div class="col-lg-12">
                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" disabled {{ $sanctionDetail ? 'checked' : '' }}>
                                                <label class="form-check-label" style="opacity: 1">{{ $sanction->name }}</label>
                                                <input type="text" class="form-control mt-1" value="{{ $sanctionDetail?->additional_information }}" readonly>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
