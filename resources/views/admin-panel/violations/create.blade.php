@extends('admin-panel.layouts.app')
@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Data Pelanggaran</h4>
                        </div>
                        <div class="card-body">
                            <form action="">
                                @csrf

                                <div class="card border-primary border">
                                    <div class="card-header text-bg-primary">
                                        <h4 class="card-title text-uppercase">A. Identitas Pelanggar</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <label for="perusahaan_id" class="form-label">GSE</label>
                                                <select class="select2 @error('perusahaan_id') is-invalid @enderror form-select" data-toggle="select2" id="perusahaan_id" name="perusahaan_id">
                                                    <option value="#" hidden disabled selected>Pilih GSE yang melakukan pelanggaran</option>
                                                    <option value="#">Mobil</option>
                                                </select>
                                                @error('perusahaan_id')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-4 mb-3">
                                                <label for="gse_serial" class="form-label">Nama Pelanggar</label>
                                                <input type="text" id="gse_serial" class="form-control @error('gse_serial') is-invalid @enderror" name="gse_serial" placeholder="Masukkan Nomor Sticker GSE" value="{{ old('gse_serial') }}">
                                                @error('gse_serial')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-4 mb-3">
                                                <label for="gse_serial" class="form-label">Tanggal Kejadian</label>
                                                <input type="text" id="gse_serial" class="form-control @error('gse_serial') is-invalid @enderror" name="gse_serial" placeholder="Masukkan Nomor Sticker GSE" value="{{ old('gse_serial') }}">
                                                @error('gse_serial')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-4 mb-3">
                                                <label for="gse_serial" class="form-label">Waktu Kejadian</label>
                                                <input type="text" id="gse_serial" class="form-control @error('gse_serial') is-invalid @enderror" name="gse_serial" placeholder="Masukkan Nomor Sticker GSE" value="{{ old('gse_serial') }}">
                                                @error('gse_serial')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="gse_serial" class="form-label">Instansi/Perusahaan Pelanggar</label>
                                                <input type="text" id="gse_serial" class="form-control @error('gse_serial') is-invalid @enderror" name="gse_serial" placeholder="Masukkan Nomor Sticker GSE" value="{{ old('gse_serial') }}">
                                                @error('gse_serial')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="gse_serial" class="form-label">No. Pas Bandara/Area/Valid</label>
                                                <input type="text" id="gse_serial" class="form-control @error('gse_serial') is-invalid @enderror" name="gse_serial" placeholder="Masukkan Nomor Sticker GSE" value="{{ old('gse_serial') }}">
                                                @error('gse_serial')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="gse_serial" class="form-label">No. TIM/Jenis/Valid</label>
                                                <input type="text" id="gse_serial" class="form-control @error('gse_serial') is-invalid @enderror" name="gse_serial" placeholder="Masukkan Nomor Sticker GSE" value="{{ old('gse_serial') }}">
                                                @error('gse_serial')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="gse_serial" class="form-label">Jenis Lisensi/Rating</label>
                                                <input type="text" id="gse_serial" class="form-control @error('gse_serial') is-invalid @enderror" name="gse_serial" placeholder="Masukkan Nomor Sticker GSE" value="{{ old('gse_serial') }}">
                                                @error('gse_serial')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="gse_serial" class="form-label">No. Lisensi/Validitas/No. Polisi</label>
                                                <input type="text" id="gse_serial" class="form-control @error('gse_serial') is-invalid @enderror" name="gse_serial" placeholder="Masukkan Nomor Sticker GSE" value="{{ old('gse_serial') }}">
                                                @error('gse_serial')
                                                    <div class="invalid-feedback" bis_skin_checked="1">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="gse_serial" class="form-label">Lokasi Kejadian</label>
                                                <input type="text" id="gse_serial" class="form-control @error('gse_serial') is-invalid @enderror" name="gse_serial" placeholder="Masukkan Nomor Sticker GSE" value="{{ old('gse_serial') }}">
                                                @error('gse_serial')
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
                                                    <input type="checkbox" class="form-check-input" id="customCheck3">
                                                    <label class="form-check-label" for="customCheck3">{{ $type->name }}</label>

                                                    @if ($type->additional_form == 1)
                                                        <input type="text" id="gse_serial" class="form-control @error('gse_serial') is-invalid @enderror mt-1" name="gse_serial" placeholder="Masukkan Informasi Tambahan" value="{{ old('gse_serial') }}">
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
                                                <div class="col-lg-6">
                                                    <div class="form-check form-check-inline mb-2" bis_skin_checked="1">
                                                        <input type="checkbox" class="form-check-input" id="customCheck3">
                                                        <label class="form-check-label" for="customCheck3">{{ $sanction->name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach

                                            <div class="col-12">
                                                <div class="col-12 form-check form-check-inline mb-2" bis_skin_checked="1">
                                                    <input type="checkbox" class="form-check-input" id="customCheck3">
                                                    <label class="form-check-label" for="customCheck3">Lainnya</label>
                                                    <input type="text" id="gse_serial" class="form-control mt-1" name="gse_serial" placeholder="Masukkan Informasi Tambahan" value="{{ old('gse_serial') }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
