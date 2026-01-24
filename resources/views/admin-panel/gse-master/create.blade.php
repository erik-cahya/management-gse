@extends('admin-panel.layouts.app')
<link href="{{ asset('admin') }}/assets/vendor/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class=".card-title">Add New Data GSE</h4>

                        </div>
                        <div class="card-body">

                            <form enctype="multipart/form-data" method="POST" action="{{ route('gse.store') }}">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="gse_serial" class="form-label">Nomor Sticker GSE</label>
                                            <input type="text" id="gse_serial" class="form-control @error('gse_serial') is-invalid @enderror" name="gse_serial" placeholder="Masukkan Nomor Sticker GSE" value="{{ old('gse_serial') }}">
                                            @error('gse_serial')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="nomor_asset" class="form-label">Nomor Asset/Inventory GSE</label>
                                            <input type="text" id="nomor_asset" class="form-control @error('nomor_asset') is-invalid @enderror" name="nomor_asset" placeholder="Masukkan Nomor Sticker GSE" value="{{ old('nomor_asset') }}">
                                            @error('nomor_asset')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="nopol_kendaraan" class="form-label">Nomor Plat/Nopol Kendaraan</label>
                                            <input type="text" id="nopol_kendaraan" class="form-control @error('nopol_kendaraan') is-invalid @enderror" name="nopol_kendaraan" placeholder="Masukkan Nomor Plat/Nopol Kendaraan" value="{{ old('nopol_kendaraan') }}">
                                            @error('nopol_kendaraan')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="perusahaan_id" class="form-label">Perusahaan</label>
                                            <select class="select2 @error('perusahaan_id') is-invalid @enderror form-select" data-toggle="select2" id="perusahaan_id" name="perusahaan_id">
                                                <option value="#" hidden disabled selected>Pilih Nama Perusahaan</option>
                                                @foreach ($dataPerusahaan as $perusahaan)
                                                    <option value="{{ $perusahaan->perusahaan_id }}" {{ old('perusahaan_id') == $perusahaan->perusahaan_id ? 'selected' : '' }}>{{ $perusahaan->nama_perusahaan }}</option>
                                                @endforeach
                                            </select>
                                            @error('perusahaan_id')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="type_peralatan_gse" class="form-label">Peralatan GSE</label>
                                            <select class="select2 @error('type_peralatan_gse') is-invalid @enderror form-select" data-toggle="select2" id="type_peralatan_gse" name="type_peralatan_gse">
                                                <option value="#" hidden disabled selected>Pilih Peralatan GSE</option>
                                                @foreach ($typePeralatan as $peralatan)
                                                    <option value="{{ $peralatan->peralatan_id }}" {{ old('type_peralatan_gse') == $peralatan->peralatan_id ? 'selected' : '' }}>{{ $peralatan->nama_peralatan }}</option>
                                                @endforeach
                                            </select>
                                            @error('type_peralatan_gse')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="merk" class="form-label">Merk/Lain Lain</label>
                                            <input type="text" id="merk" class="form-control @error('merk') is-invalid @enderror" name="merk" placeholder="Masukkan Merk Kendaraan" value="{{ old('merk') }}">
                                            @error('merk')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="kategori" class="form-label">Kategori</label>
                                            <select class="select2 @error('kategori') is-invalid @enderror form-select" data-toggle="select2" id="kategori" name="kategori">
                                                <option value="#" hidden disabled selected>Pilih Kategori</option>
                                                @foreach ($dataKategori as $kategori)
                                                    <option value="{{ $kategori->kategori_id }}" {{ old('kategori') == $kategori->kategori_id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="bahan_bakar" class="form-label">Bahan Bakar</label>
                                            <select class="select2 @error('bahan_bakar') is-invalid @enderror form-select" data-toggle="select2" id="bahan_bakar" name="bahan_bakar">
                                                <option value="#" hidden disabled selected>Pilih bahan bakar</option>
                                                @foreach ($dataBahanBakar as $bahan_bakar)
                                                    <option value="{{ $bahan_bakar->bahan_bakar_id }}" {{ old('bahan_bakar') == $bahan_bakar->bahan_bakar_id ? 'selected' : '' }}>{{ $bahan_bakar->nama_bahan_bakar }}</option>
                                                @endforeach
                                            </select>
                                            @error('bahan_bakar')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="panjang" class="form-label">Panjang (m²)</label>
                                            <input type="text" id="panjang" class="form-control @error('panjang') is-invalid @enderror" name="panjang" placeholder="Masukkan Ukuran Panjang Kendaraan" value="{{ old('panjang') }}">
                                            @error('panjang')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="lebar" class="form-label">Lebar (m²)</label>
                                            <input type="text" id="lebar" class="form-control @error('lebar') is-invalid @enderror" name="lebar" placeholder="Masukkan Ukuran Lebar Kendaraan" value="{{ old('lebar') }}">
                                            @error('lebar')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="luas" class="form-label">Luas (m²)</label>
                                            <input type="text" id="luas" class="form-control @error('luas') is-invalid @enderror" name="luas" placeholder="Masukkan Ukuran Luas Kendaraan" value="{{ old('luas') }}">
                                            @error('luas')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="manufacture_year" class="form-label">Manufacture Year</label>
                                            <input type="number" id="manufacture_year" class="form-control @error('manufacture_year') is-invalid @enderror" name="manufacture_year" placeholder="Masukkan Tahun Manufaktur Kendaraan" value="{{ old('manufacture_year') }}">
                                            @error('manufacture_year')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="status_kepemilikan" class="form-label">Status Kepemilikan</label>
                                            <select class="select2 @error('status_kepemilikan') is-invalid @enderror form-select" data-toggle="select2" id="status_kepemilikan" name="status_kepemilikan">
                                                <option value="#" hidden disabled selected>Pilih status kepemilikan</option>
                                                @foreach ($dataStatusKepemilikan as $status_kepemilikan)
                                                    <option value="{{ $status_kepemilikan->kepemilikan_id }}" {{ old('status_kepemilikan') == $status_kepemilikan->kepemilikan_id ? 'selected' : '' }}>{{ $status_kepemilikan->nama_kepemilikan }}</option>
                                                @endforeach
                                            </select>
                                            @error('status_kepemilikan')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="perusahaan_sewa" class="form-label">Perusahaan Sewa</label>
                                            <input type="text" id="perusahaan_sewa" class="form-control @error('perusahaan_sewa') is-invalid @enderror" name="perusahaan_sewa" placeholder="Masukkan nama perusahaan sewa" value="{{ old('perusahaan_sewa') }}">
                                            @error('perusahaan_sewa')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="status_sewa" class="form-label">Status Sewa</label>
                                            <input type="text" id="status_sewa" class="form-control @error('status_sewa') is-invalid @enderror" name="status_sewa" placeholder="Masukkan status sewa" value="{{ old('status_sewa') }}">
                                            @error('status_sewa')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="tanggal_sewa" class="form-label">Tanggal Sewa</label>
                                            <input type="date" id="tanggal_sewa" class="form-control @error('tanggal_sewa') is-invalid @enderror" name="tanggal_sewa" placeholder="Masukkan tanggal sewa" value="{{ old('tanggal_sewa') }}">
                                            @error('tanggal_sewa')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="mb-3">
                                            <label for="kode_gh" class="form-label">Kode GH</label>
                                            <select class="select2 @error('kode_gh') is-invalid @enderror form-select" data-toggle="select2" id="kode_gh" name="kode_gh">
                                                <option value="#" hidden disabled selected>Pilih Kode GH</option>
                                                @foreach ($dataKodeGH as $kode_gh)
                                                    <option value="{{ $kode_gh->kode_gh_id }}" {{ old('kode_gh') == $kode_gh->kode_gh_id ? 'selected' : '' }}>{{ $kode_gh->kode_gh }}</option>
                                                @endforeach
                                            </select>
                                            @error('kode_gh')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="mb-3">
                                            <label for="kode_gse" class="form-label">Kode GSE</label>
                                            <select class="select2 @error('kode_gse') is-invalid @enderror form-select" data-toggle="select2" id="kode_gse" name="kode_gse">
                                                <option value="#" hidden disabled selected>Pilih Kode GSE</option>
                                                @foreach ($dataKodeGSE as $kode_gse)
                                                    <option value="{{ $kode_gse->kode_gse_id }}" {{ old('kode_gse') == $kode_gse->kode_gse_id ? 'selected' : '' }}>{{ $kode_gse->kode_gse }}</option>
                                                @endforeach
                                            </select>
                                            @error('kode_gse')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="status_gse" class="form-label">Status GSE</label>
                                            <select class="select2 @error('status_gse') is-invalid @enderror form-select" data-toggle="select2" id="status_gse" name="status">
                                                <option value="" disabled selected hidden>Pilih Status GSE</option>
                                                <option value="1" {{ old('status') === '1' ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ old('status') === '0' ? 'selected' : '' }}>Not Active</option>
                                            </select>
                                            @error('status')
                                                <style>
                                                    #status_gse {
                                                        border-color: #d03f3f
                                                    }
                                                </style>
                                                <div class="invalid-tooltip d-block position-static">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary" type="submit">Create Data GSE</button>
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
@push('script')
    <script src="{{ asset('admin') }}/assets/vendor/select2/js/select2.min.js"></script>
@endpush
