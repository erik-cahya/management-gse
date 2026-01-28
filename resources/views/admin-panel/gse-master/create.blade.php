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
                                                <div class="invalid-feedback" bis_skin_checked="1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="asset_number" class="form-label">Nomor Asset/Inventory GSE</label>
                                            <input type="text" id="asset_number" class="form-control @error('asset_number') is-invalid @enderror" name="asset_number" placeholder="Masukkan Nomor Sticker GSE" value="{{ old('asset_number') }}">

                                            @error('asset_number')
                                                <div class="invalid-feedback" bis_skin_checked="1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="vehicle_number" class="form-label">Nomor Plat/Nopol Kendaraan</label>
                                            <input type="text" id="vehicle_number" class="form-control @error('vehicle_number') is-invalid @enderror" name="vehicle_number" placeholder="Masukkan Nomor Plat/Nopol Kendaraan" value="{{ old('vehicle_number') }}">
                                            @error('vehicle_number')
                                                <div class="invalid-feedback" bis_skin_checked="1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="company_id" class="form-label">Perusahaan</label>
                                            <select class="select2 @error('company_id') is-invalid @enderror form-select" data-toggle="select2" id="company_id" name="company_id">
                                                <option value="#" hidden disabled selected>Pilih Nama Perusahaan</option>
                                                @foreach ($dataPerusahaan as $perusahaan)
                                                    <option value="{{ $perusahaan->company_id }}" {{ old('company_id') == $perusahaan->company_id ? 'selected' : '' }}>{{ $perusahaan->company_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('company_id')
                                                <div class="invalid-feedback" bis_skin_checked="1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="type_id" class="form-label">Peralatan GSE</label>
                                            <select class="select2 @error('type_id') is-invalid @enderror form-select" data-toggle="select2" id="type_id" name="type_id">
                                                <option value="#" hidden disabled selected>Pilih Peralatan GSE</option>
                                                @foreach ($typePeralatan as $peralatan)
                                                    <option value="{{ $peralatan->type_id }}" {{ old('type_id') == $peralatan->type_id ? 'selected' : '' }}>{{ $peralatan->type_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('type_id')
                                                <div class="invalid-feedback" bis_skin_checked="1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="brand" class="form-label">Merk/Lain Lain</label>
                                            <input type="text" id="brand" class="form-control @error('brand') is-invalid @enderror" name="brand" placeholder="Masukkan merk Kendaraan" value="{{ old('brand') }}">

                                            @error('brand')
                                                <div class="invalid-feedback" bis_skin_checked="1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Kategori</label>
                                            <select class="select2 @error('category_id') is-invalid @enderror form-select" data-toggle="select2" id="category_id" name="category_id">
                                                <option value="#" hidden disabled selected>Pilih Kategori </option>
                                                @foreach ($dataKategori as $kategori)
                                                    <option value="{{ $kategori->category_id }}" {{ old('kategori') == $kategori->category_id ? 'selected' : '' }}>{{ $kategori->category_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="invalid-feedback" bis_skin_checked="1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="fuel_type" class="form-label">Bahan Bakar</label>
                                            <select class="select2 @error('fuel_type') is-invalid @enderror form-select" data-toggle="select2" id="fuel_type" name="fuel_type">
                                                <option value="#" hidden disabled selected>Pilih bahan bakar</option>
                                                @foreach ($dataBahanBakar as $bahan_bakar)
                                                    <option value="{{ $bahan_bakar->fuel_id }}" {{ old('fuel_type') == $bahan_bakar->fuel_id ? 'selected' : '' }}>{{ $bahan_bakar->fuel_type_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('fuel_type')
                                                <div class="invalid-feedback" bis_skin_checked="1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="length" class="form-label">Panjang m²</label>
                                            <input type="text" id="length" class="form-control @error('length') is-invalid @enderror" name="length" placeholder="Masukkan Ukuran Panjang Kendaraan" value="{{ old('length') }}">
                                            @error('length')
                                                <div class="invalid-feedback" bis_skin_checked="1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="width" class="form-label">Lebar m²</label>
                                            <input type="text" id="width" class="form-control @error('width') is-invalid @enderror" name="width" placeholder="Masukkan Ukuran Lebar Kendaraan" value="{{ old('width') }}">
                                            @error('width')
                                                <div class="invalid-feedback" bis_skin_checked="1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="area" class="form-label">Luas m²</label>
                                            <input type="text" id="area" class="form-control @error('area') is-invalid @enderror" name="area" placeholder="Masukkan Ukuran Luas Kendaraan" value="{{ old('area') }}">
                                            @error('area')
                                                <div class="invalid-feedback" bis_skin_checked="1">{{ $message }}</div>
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
                                            <label for="ownership_type" class="form-label">Status Kepemilikan</label>
                                            <select class="select2 @error('ownership_type') is-invalid @enderror form-select" data-toggle="select2" id="ownership_type" name="ownership_type">
                                                <option value="#" hidden disabled selected>Pilih status kepemilikan</option>

                                                @foreach ($dataStatusKepemilikan as $status_kepemilikan)
                                                    <option value="{{ $status_kepemilikan->ownership_type_id }}" {{ old('ownership_type') == $status_kepemilikan->ownership_type_id ? 'selected' : '' }}>{{ $status_kepemilikan->ownership_name }}</option>
                                                @endforeach

                                            </select>
                                            @error('ownership_type')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="rental_company" class="form-label">Perusahaan Sewa</label>
                                            <input type="text" id="rental_company" class="form-control @error('rental_company') is-invalid @enderror" name="rental_company" placeholder="Masukkan nama perusahaan sewa" value="{{ old('rental_company') }}">
                                            @error('rental_company')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="rental_status" class="form-label">Status Sewa</label>
                                            <input type="text" id="rental_status" class="form-control @error('rental_status') is-invalid @enderror" name="rental_status" placeholder="Masukkan status sewa" value="{{ old('rental_status') }}">
                                            @error('rental_status')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="rental_date" class="form-label">Tanggal Sewa</label>
                                            <input type="date" id="rental_date" class="form-control @error('rental_date') is-invalid @enderror" name="rental_date" placeholder="Masukkan tanggal sewa" value="{{ old('rental_date') }}">
                                            @error('rental_date')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="mb-3">
                                            <label for="code_gh" class="form-label">Kode GH</label>
                                            <select class="select2 @error('code_gh') is-invalid @enderror form-select" data-toggle="select2" id="code_gh" name="code_gh">
                                                <option value="#" hidden disabled selected>Pilih Kode GH</option>
                                                @foreach ($dataKodeGH as $code_gh)
                                                    <option value="{{ $code_gh->code_gh_id }}" {{ old('code_gh') == $code_gh->code_gh_id ? 'selected' : '' }}>{{ $code_gh->code_gh }}</option>
                                                @endforeach
                                            </select>
                                            @error('code_gh')
                                                <div class="invalid-feedback" bis_skin_checked="1">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-2">
                                        <div class="mb-3">
                                            <label for="code_gse" class="form-label">Kode GSE</label>
                                            <select class="select2 @error('code_gse') is-invalid @enderror form-select" data-toggle="select2" id="code_gse" name="code_gse">
                                                <option value="#" hidden disabled selected>Pilih Kode GSE</option>
                                                @foreach ($dataKodeGSE as $code_gse)
                                                    <option value="{{ $code_gse->code_gse_id }}" {{ old('code_gse') == $code_gse->code_gse_id ? 'selected' : '' }}>{{ $code_gse->code_gse }}</option>
                                                @endforeach
                                            </select>
                                            @error('code_gse')
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
                                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Not Active</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button class="btn btn-primary" type="submit">Edit Data GSE</button>
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
