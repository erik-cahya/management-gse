@extends('admin-panel.layouts.app')
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
                            <div class="row">
                                <div class="col-lg-6">
                                    <form enctype="multipart/form-data" method="POST" action="{{ route('gse.store') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Nomor Seri GSE</label>
                                            <input type="text" id="simpleinput" class="form-control" name="gse_serial" placeholder="Masukkan Nomor Seri GSE" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Jenis GSE</label>
                                            <select class="form-select" id="example-select" name="gse_type" required>
                                                <option value="#" disabled selected hidden>Pilih Jenis GSE</option>
                                                <option value="Bus">Bus</option>
                                                <option value="Tractor">Tractor</option>
                                                <option value="Belt Loader">Belt Loader</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Operator GSE</label>
                                            <select class="form-select" id="example-select" name="operator" required>
                                                <option value="" disabled selected hidden>Pilih Operator</option>
                                                <option value="Operator">Operator</option>
                                                <option value="Maskapai">Maskapai</option>
                                                <option value="Ground Handling">Ground Handling</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Area Operasi</label>
                                            <select class="form-select" id="example-select" name="operation_area">
                                                <option value="" disabled selected hidden>Pilih Area Operasi GSE</option>
                                                <option value="Operator">Operator</option>
                                                <option value="Maskapai">Maskapai</option>
                                                <option value="Ground Handling">Ground Handling</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Status GSE</label>
                                            <select class="form-select" id="example-select" name="status" required>
                                                <option value="" disabled selected hidden>Pilih Status GSE</option>
                                                <option value="1">Active</option>
                                                <option value="0">Not Active</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Create Data GSE</button>
                                        </div>

                                    </form>
                                </div> <!-- end col -->

                            </div>
                            <!-- end row-->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->

        </div> <!-- container -->

    </div>
@endsection
