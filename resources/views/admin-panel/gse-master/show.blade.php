@extends('admin-panel.layouts.app')
@push('style')
    <!-- Datatables css -->
    <link href="{{ asset('admin') }}/assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
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

                                <div class="row">
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Nomor Serial GSE" value="{{ $dataGse->gse_serial ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Nomor Asset/Inventory" value="{{ $dataGse->asset_number ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Nomor Kendaraan" value="{{ $dataGse->vehicle_number ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Perusahaan" value="{{ $dataGse->companies->company_name ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Type Peralatan" value="{{ $dataGse->types->type_name ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Merk GSE" value="{{ $dataGse->brand ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Kategori GSE" value="{{ $dataGse->categories->category_name ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Bahan Bakar" value="{{ $dataGse->fuels->fuel_type_name ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Panjang GSE" value="{{ $dataGse->length ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Lebar GSE" value="{{ $dataGse->width ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Luas GSE" value="{{ $dataGse->area ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Tahun Manufaktur" value="{{ $dataGse->manufacture_year ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Status Kepemilikan GSE" value="{{ $dataGse->ownerships->ownership_name ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Perusahaan Sewa" value="{{ $dataGse->rental_company ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Status Sewa" value="{{ $dataGse->rental_status ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Tanggal Sewa" value="{{ $dataGse->rental_date ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Kode GH" value="{{ $dataGse->codeGH->code_gh ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Kode GSE" value="{{ $dataGse->codeGSE->code_gse ?? '-' }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Status GSE" value="{{ $dataGse->status == 1 ? 'Active' : 'Deactive' }}" disabled />

                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Diubah" value="{{ $dataGse->updated_at->format('d M Y | H:i:s') }}" disabled />
                                    <x-form.input className="col-md-4 mb-3" type="text" name="serial_gse" label="Ditambahkan" value="{{ $dataGse->created_at->format('d M Y | H:i:s') }}" disabled />

                                    <div class="col-md-12">
                                        <div class="alert {{ $dataGse->status === 1 ? 'alert-success' : 'alert-danger' }} d-flex align-items-center" role="alert">
                                            <i class="{{ $dataGse->status === 1 ? 'mdi mdi-check' : 'mdi mdi-alert' }} fs-16 me-1"></i>
                                            <div>{{ $dataGse->status === 1 ? 'GSE Active' : 'GSE Not Active' }}</div>
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
                                <table id="scroll-horizontal-datatable" class="table-striped table-bordered table-sm fs-12 w-100 nowrap table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pelanggar</th>
                                            <th>Instansi</th>
                                            <th>Tanggal Kejadian</th>
                                            <th>Lokasi Kejadian</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataViolations as $violation)
                                            {{-- {{ dd($violation) }} --}}
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $violation->full_name }}</td>
                                                <td>{{ $violation->company_name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($violation->violationReports->incident_date)->locale('id')->translatedFormat('l, d F Y') }}</td>
                                                <td>{{ $violation->violationReports->incident_location }}</td>
                                                <td>
                                                    <a href="{{ route('violation.show', $violation->violator_id) }}">Details</a>
                                                </td>
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
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>

    <!-- Datatable Demo App js -->
    <script src="{{ asset('admin') }}/assets/js/pages/datatable.init.js"></script>
@endpush
