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
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class=".card-title">All Data GSE</h4>
                </div>
                <div class="card-body">
                    <table id="scroll-horizontal-datatable" class="table-striped w-100 nowrap table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Serial</th>
                                <th>Nomor Asset/Inventory</th>
                                <th>Nopol Kendaraan</th>
                                <th>Perusahaan</th>
                                <th>Type Peratalatan</th>
                                <th>Merk GSE</th>
                                <th>Kategori</th>
                                <th>Bahan Bakar</th>
                                <th>Panjang GSE</th>
                                <th>Lebar GSE</th>
                                <th>Luas GSE</th>
                                <th>Tahun Manufaktur</th>
                                <th>Status Kepemilikan</th>
                                <th>Perusahaan Sewa</th>
                                <th>Status Sewa</th>
                                <th>Tanggal Sewa</th>
                                <th>Kode GH</th>
                                <th>Kode GSE</th>
                                <th>Status GSE</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($dataGSE as $gse)
                                <tr>
                                    <td>
                                        <span class="bg-primary rounded-4 px-2 text-white">{{ $loop->iteration }}</span>
                                    </td>

                                    <td>
                                        <div class="">{{ $gse->gse_serial }}</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->nomor_asset }}</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->nopol_kendaraan }}</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->perusahaan->nama_perusahaan }}</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->typePeralatan->nama_peralatan }}</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->merk }}</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->kategori_gse->nama_kategori }}</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->bahanBakar->nama_bahan_bakar }}</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->panjang }} m²</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->lebar }} m²</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->luas }} m²</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->manufacture_year }}</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->statusKepemilikan->nama_kepemilikan }}</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->perusahaan_sewa }}</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->status_sewa }}</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->tanggal_sewa }}</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->kodeGH->kode_gh }}</div>
                                    </td>
                                    <td>
                                        <div class="">{{ $gse->kodeGSE->kode_gse }}</div>
                                    </td>


                                    <td>
                                        <span class="badge {{ $gse->status == 1 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }}">{{ $gse->status == 1 ? 'Active' : 'Not Active' }}</span>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="{{ route('gse.show', $gse->gse_serial) }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="See Details" data-bs-custom-class="success-tooltip"><i class="mdi mdi-eye"></i> </a>

                                            <a href="{{ route('gse.edit', $gse->gse_serial) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Data" data-bs-custom-class="warning-tooltip"><i class="mdi mdi-lead-pencil"></i> </a>

                                            <input type="hidden" class="gseID" value="{{ $gse->id }}">
                                            <button type="button" class="btn btn-sm btn-danger deleteButton" data-nama="{{ $gse->gse_serial }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Data" data-bs-custom-class="danger-tooltip">
                                                <i class="mdi mdi-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div> <!-- end row-->
@endsection
@push('script')
    <!-- Datatables js -->
    <!-- Datatables js -->
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>

    <!-- Datatable Demo App js -->
    <script src="{{ asset('admin') }}/assets/js/pages/datatable.init.js"></script>

    {{-- Sweet Alert --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Saat halaman sudah ready
            const deleteButtons = document.querySelectorAll('.deleteButton');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    let propertyName = this.getAttribute('data-nama');
                    let gseID = this.parentElement.querySelector('.gseID').value;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Delete data " + propertyName + "?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim DELETE request manual lewat JavaScript
                            fetch('/gse/' + gseID, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Content-Type': 'application/json'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    Swal.fire({
                                        title: data.judul,
                                        text: data.pesan,
                                        icon: data.swalFlashIcon,
                                    });

                                    // Optional: reload table / halaman
                                    setTimeout(() => {
                                        location.reload();
                                    }, 1500);
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    Swal.fire('Error', 'Something went wrong!', 'error');
                                });
                        }
                    });
                });
            });
        });
    </script>
@endpush
