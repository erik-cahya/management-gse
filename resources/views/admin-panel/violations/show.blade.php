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
                                            <input type="checkbox" class="form-check-input" disabled {{ $detail ? 'checked' : '' }}>

                                            <label class="form-check-label">
                                                {{ $type->name }}
                                            </label>
                                        @endif

                                        {{-- DENGAN additional --}}
                                        @if ($type->additional_form == 1)
                                            <input type="checkbox" class="form-check-input" disabled {{ $detail ? 'checked' : '' }}>

                                            <label class="form-check-label">
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
                            <h4 class="card-title text-uppercase">C. Sanksi</h4>
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
                                        <div class="col-lg-6">
                                            <div class="form-check form-check-inline mb-2">
                                                <input type="checkbox" class="form-check-input" disabled {{ $sanctionDetail ? 'checked' : '' }}>

                                                <label class="form-check-label">
                                                    {{ $sanction->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endif

                                    {{-- DENGAN additional --}}
                                    @if ($sanction->additional_form === 1)
                                        <div class="col-lg-12">
                                            <div class="form-check form-check-inline mb-2">

                                                <input type="checkbox" class="form-check-input" disabled {{ $sanctionDetail ? 'checked' : '' }}>

                                                <label class="form-check-label">
                                                    {{ $sanction->name }}
                                                </label>

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
