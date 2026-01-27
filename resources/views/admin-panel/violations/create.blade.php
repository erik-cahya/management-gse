@extends('admin-panel.layouts.app')
@push('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Daterangepicker css -->
    <link href="{{ asset('admin') }}/assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Data Pelanggaran Vehicle</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('violation.store') }}" method="POST">
                                @csrf

                                <div class="card border-primary border">
                                    <div class="card-header text-bg-primary">
                                        <h4 class="card-title text-uppercase">A. Identitas Pelanggar</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <label for="gse_id" class="form-label">GSE</label>
                                                <select class="select2 @error('gse_id') is-invalid @enderror form-select" data-toggle="select2" id="gse_id" name="gse_id">
                                                    <option value="#" hidden disabled selected>Pilih GSE yang melakukan pelanggaran</option>
                                                    @foreach ($dataGSE as $gse)
                                                        <option value="{{ $gse->gse_id }}">{{ $gse->vehicle_number . ' | ' . $gse->gse_serial . ' | ' . $gse->types->type_name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('gse_id')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-4 mb-3">
                                                <label for="full_name" class="form-label">Nama Pelanggar</label>
                                                <input type="text" id="full_name" class="form-control @error('full_name') is-invalid @enderror" name="full_name" placeholder="Masukkan Nama Pelanggar" value="{{ old('full_name') }}">
                                                @error('full_name')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-4 mb-3">
                                                <label for="incident_date" class="form-label">Tanggal Kejadian</label>
                                                <input type="text" id="incident_date" class="form-control single-date @error('incident_date') is-invalid @enderror" name="incident_date" placeholder="Masukkan tanggal pelanggaran" value="{{ old('incident_date') }}">
                                                @error('incident_date')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-4 mb-3">
                                                <label for="incident_time" class="form-label">Waktu Kejadian</label>
                                                <input type="time" id="incident_time" class="form-control @error('incident_time') is-invalid @enderror" name="incident_time" placeholder="Masukkan Waktu/Jam pelanggaran" value="{{ old('incident_time') }}">
                                                @error('incident_time')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="company_name" class="form-label">Instansi/Perusahaan Pelanggar</label>
                                                <input type="text" id="company_name" class="form-control @error('company_name') is-invalid @enderror" name="company_name" placeholder="Masukkan nama instansi perusahaan" value="{{ old('company_name') }}">
                                                @error('company_name')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="airport_pass_number" class="form-label">No. Pas Bandara/Area/Valid</label>
                                                <input type="text" id="airport_pass_number" class="form-control @error('airport_pass_number') is-invalid @enderror" name="airport_pass_number" placeholder="Masukkan nomor pas bandara/area/valid" value="{{ old('airport_pass_number') }}">
                                                @error('airport_pass_number')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="tim_number" class="form-label">No. TIM/Jenis/Valid</label>
                                                <input type="text" id="tim_number" class="form-control @error('tim_number') is-invalid @enderror" name="tim_number" placeholder="Masukkan No. TIM/Jenis/Valid" value="{{ old('tim_number') }}">
                                                @error('tim_number')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="license_type" class="form-label">Jenis Lisensi/Rating</label>
                                                <input type="text" id="license_type" class="form-control @error('license_type') is-invalid @enderror" name="license_type" placeholder="Masukkan Jenis Lisensi/Rating" value="{{ old('license_type') }}">
                                                @error('license_type')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="vehicle_plate_number" class="form-label">No. Lisensi/Validitas/No. Polisi</label>
                                                <input type="text" id="vehicle_plate_number" class="form-control @error('vehicle_plate_number') is-invalid @enderror" name="vehicle_plate_number" placeholder="Masukkan No. Lisensi/Validitas/No. Polisi" value="{{ old('vehicle_plate_number') }}">
                                                @error('vehicle_plate_number')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="incident_location" class="form-label">Lokasi Kejadian</label>
                                                <input type="text" id="incident_location" class="form-control @error('incident_location') is-invalid @enderror" name="incident_location" placeholder="Masukkan lokasi kejadian" value="{{ old('incident_location') }}">
                                                @error('incident_location')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card border-primary border">
                                    <div class="card-header text-bg-primary">
                                        <h4 class="card-title text-uppercase">B. Jenis Pelanggaran</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($violationType as $type)
                                                <div class="form-check form-check-inline mb-3" bis_skin_checked="1">
                                                    @if ($type->additional_form == 0)
                                                        <input type="checkbox" class="form-check-input" id="violation_type_id[{{ $type->violation_type_id }}]" name="violation_type_id[{{ $type->violation_type_id }}]">
                                                        <label class="form-check-label" for="violation_type_id[{{ $type->violation_type_id }}]">{{ $type->name }}</label>
                                                    @endif
                                                    @if ($type->additional_form == 1)
                                                        {{-- <input type="checkbox" class="form-check-input" id="violation_type_id_additional_checkbox[{{ $type->violation_type_id }}]" name="violation_type_id_additional_checkbox[{{ $type->violation_type_id }}]">
                                                        <label class="form-check-label" for="violation_type_id_additional_checkbox[{{ $type->violation_type_id }}]">{{ $type->name }}</label>
                                                        <input type="text" id="additional_note_{{ $type->violation_type_id }}" class="form-control mt-1" name="violation_type_id_additional_text[{{ $type->violation_type_id }}]" placeholder="Masukkan Informasi Tambahan"> --}}

                                                        <input type="checkbox" class="form-check-input toggle-additional" data-target="additional_{{ $type->violation_type_id }}" name="violation_type_id_additional_checkbox[{{ $type->violation_type_id }}]">
                                                        <label class="form-check-label" for="violation_type_id_additional_checkbox[{{ $type->violation_type_id }}]">{{ $type->name }}</label>
                                                        <input type="text" class="form-control d-none mt-1" id="additional_{{ $type->violation_type_id }}" name="violation_type_id_additional_text[{{ $type->violation_type_id }}]">
                                                    @endif

                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>

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
                                                @if ($sanction->additional_form === 0)
                                                    <div class="col-lg-6">
                                                        <div class="form-check form-check-inline mb-2" bis_skin_checked="1">
                                                            <input type="checkbox" class="form-check-input" id="sanction[{{ $sanction->sanction_id }}]" name="sanction[{{ $sanction->sanction_id }}]">
                                                            <label class="form-check-label" for="sanction[{{ $sanction->sanction_id }}]">{{ $sanction->name }}</label>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach

                                            @foreach ($dataSanction as $sanction)
                                                @if ($sanction->additional_form === 1)
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="col-12 form-check form-check-inline mb-2" bis_skin_checked="1">
                                                                <input type="checkbox" class="form-check-input" id="additional_sanction_checbox[{{ $sanction->sanction_id }}]" name="additional_sanction_checkbox[{{ $sanction->sanction_id }}]">
                                                                <label class="form-check-label" for="additional_sanction_checbox[{{ $sanction->sanction_id }}]">{{ $sanction->name }}</label>
                                                                <input type="text" class="form-control mt-1" id="additional_sanction_{{ $sanction->sanction_id }}" name="additional_sanction_text[{{ $sanction->sanction_id }}]" placeholder="Masukkan Informasi Tambahan">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <!-- Daterangepicker Plugin js -->
    <script src="{{ asset('admin') }}/assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/daterangepicker/daterangepicker.js"></script>

    <script>
        document.querySelectorAll('.toggle-additional').forEach(cb => {
            cb.addEventListener('change', function() {
                document
                    .getElementById(this.dataset.target)
                    .classList.toggle('d-none', !this.checked);
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $(function() {
                $('.single-date').daterangepicker({
                    singleDatePicker: true,
                    autoUpdateInput: false,
                    locale: {
                        format: 'DD/MM/YYYY'
                    }
                });

                $('.single-date').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('DD/MM/YYYY'));
                }).on('cancel.daterangepicker', function() {
                    $(this).val('');
                });
            });
        });
    </script>
@endpush
