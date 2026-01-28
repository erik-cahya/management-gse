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
                        <h4 class=".card-title">List Pelanggaran GSE</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <table id="scroll-horizontal-datatable" class="table-striped table-bordered table-sm fs-12 w-100 nowrap table">
                                    <thead>
                                        <tr class="text-center align-middle">
                                            <th>No</th>
                                            <th>Nama Pelanggar</th>
                                            <th>Instansi/Perusahaan<br>Pelanggar</th>
                                            <th>Tanggal & Waktu Kejadian</th>
                                            <th>Lokasi Kejadian</th>
                                            <th>No. Lisensi/Validitas/<br>No. Polisi</th>
                                            <th>No. Pas Bandara/Area/<br>Valid</th>
                                            <th>GSE</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fs-12">

                                        @foreach ($dataViolation as $violation)
                                            <tr class="text-uppercase text-center align-middle">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $violation->full_name }}</td>
                                                <td>{{ $violation->company_name }}</td>
                                                <td>{{ \Carbon\Carbon::parse($violation->violationReports->incident_date)->locale('id')->translatedFormat('l, d F Y') . ' | ' . $violation->violationReports->incident_time }}</td>
                                                <td>{{ $violation->violationReports->incident_location ?? 'Tidak ada data' }}</td>
                                                <td>{{ $violation->vehicle_plate_number }}</td>
                                                <td>{{ $violation->airport_pass_number }}</td>
                                                <td class="d-flex flex-column">
                                                    <span>
                                                        GSE Serial : {{ $violation->gseData->gse_serial }}
                                                    </span>
                                                    <hr class="m-1">
                                                    <span>
                                                        WH ID : {{ $violation->gseData->asset_number }}
                                                    </span>
                                                </td>
                                                <td class="text-center">

                                                    <a href="{{ route('violation.show', $violation->violator_id) }}" class="text-reset fs-16 px-1"> <i class="ri-eye-line"></i></a>

                                                    <input type="hidden" class="gseID" value="{{ $violation->violator_id }}">
                                                    <a href="javascript:void(0)" class="text-reset fs-16 deleteButton px-1" data-nama="{{ $violation->full_name }}"> <i class="ri-delete-bin-2-line"></i></a>
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

    {{-- Sweet Alert --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Saat halaman sudah ready
            const deleteButtons = document.querySelectorAll('.deleteButton');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    let dataName = this.getAttribute('data-nama');
                    let gseID = this.parentElement.querySelector('.gseID').value;

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Delete data pelanggaran " + dataName + "?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Kirim DELETE request manual lewat JavaScript
                            fetch('/violation/' + gseID, {
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
