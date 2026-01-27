@extends('admin-panel.layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class=".card-title">Search Data GSE</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form method="POST" action="{{ route('gse.searchData') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="keyword_search" class="form-label">Keyword <small>(Nomor Serial / Nomor Asset / Nopol Kendaraan)</small></label>
                                            <input type="text" id="keyword_search" class="form-control" name="keyword_search" placeholder="Masukkan Nomor Serial / Nomor Asset / Nopol Kendaraan" value="{{ $inputSerial ?? '' }}">
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Search Data GSE</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @if (isset($inputSerial))
            @if ($dataGse !== null)
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class=".card-title">Data GSE Ditemukan</h4>
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
                                                <div class="timeline timeline-left">
                                                    {{-- @foreach ($dataViolations as $pelanggaran)
                                                        @php
                                                            if ($pelanggaran->violation_level === 'berat') {
                                                                $textClass = 'text-danger';
                                                                $bgClass = 'bg-danger';
                                                            } elseif ($pelanggaran->violation_level === 'sedang') {
                                                                $textClass = 'text-primary';
                                                                $bgClass = 'bg-primary';
                                                            } else {
                                                                $textClass = 'text-success';
                                                                $bgClass = 'bg-success';
                                                            }
                                                        @endphp
                                                        <article class="timeline-item">
                                                            <div class="timeline-desk">
                                                                <div class="panel">
                                                                    <div class="timeline-box">
                                                                        <span class="arrow"></span>
                                                                        <span class="timeline-icon {{ $bgClass }}"><i class="mdi mdi-record-circle-outline"></i></span>
                                                                        <span class="d-flex justify-content-between">

                                                                            <h4 class="fs-14 fw-semibold text-capitalize mb-1">{{ $pelanggaran->violation_name }} - {{ $pelanggaran->violation_type }}</h4>
                                                                            <h4 class="fs-14 fw-semibold {{ $textClass }} text-capitalize mb-1">Level {{ $pelanggaran->violation_level }}</h4>
                                                                        </span>

                                                                        <p class="timeline-date text-muted d-inline"><small> <i class="ri-calendar-line"></i> {{ \Carbon\Carbon::parse($pelanggaran->examination_date)->format('d M Y') }}</small></p>

                                                                        <p class="timeline-date text-muted d-inline p-2"><small> <i class="ri-user-fill"></i> {{ $pelanggaran->employee }}</small></p>
                                                                        <p class="timeline-date text-muted d-inline text-capitalize p-2"><small> <i class="ri-map-pin-2-fill"></i> {{ $pelanggaran->location }}</small></p>
                                                                        <hr>
                                                                        <p class="mt-1">{{ $pelanggaran->description }} </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    @endforeach --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-danger d-flex align-items-center" role="alert">
                                    <i class="mdi mdi-alert fs-16 me-1"></i>
                                    <div>
                                        Data GSE Tidak Ditemukan | <a href="{{ route('gse.create') }}" class="alert-link">Tambah Data GSE Baru ?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endif
        @endif
    </div>
@endsection
