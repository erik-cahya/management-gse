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
                    <table id="scroll-horizontal-datatable" class="w-100 nowrap table-bordered text-uppercase table text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nomor Stiker Angkasa Pura</th>
                                <th>Jenis Kendaraan</th>
                                <th>Nopol/Nolam</th>
                                <th>Perusahaan</th>
                                <th>Petugas Pemeriksa</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-capitalize">
                            @foreach ($checkupData as $checkup)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $checkup->no_sticker }}</td>
                                    <td>{{ $checkup->vehicle_type }}</td>
                                    <td>{{ $checkup->vehicle_number }}</td>
                                    <td>{{ $checkup->company }}</td>
                                    <td>{{ $checkup->staff_auditor }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                                            <a href="{{ route('checkup.show', $checkup->vehicle_checkup_id) }}" class="btn btn-sm btn-success" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="See Details" data-bs-custom-class="success-tooltip"><i class="mdi mdi-eye"></i> </a>

                                            <a href="{{ route('checkup.edit', $checkup->vehicle_checkup_id) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Data" data-bs-custom-class="warning-tooltip"><i class="mdi mdi-lead-pencil"></i> </a>

                                            <input type="hidden" class="gseID" value="{{ $checkup->vehicle_checkup_id }}">
                                            <button type="button" class="btn btn-sm btn-danger deleteButton" data-nama="{{ $checkup->no_sticker }}" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete Data" data-bs-custom-class="danger-tooltip">
                                                <i class="mdi mdi-trash-can"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
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
                            fetch('/checkup/' + gseID, {
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
