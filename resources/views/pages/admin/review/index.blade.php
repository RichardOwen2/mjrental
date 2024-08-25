@extends('layouts.admin.app')

@section('modal')
    @include('pages.admin.review.modal.add')
    @include('pages.admin.review.modal.edit')
@endsection

@section('content')
    <div class="card card-flush h-md-100">
        <div class="card-header pt-7">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">Konten</span>
            </h3>

            <div class="card-toolbar">
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_review">
                    Tambah Konten
                </a>
            </div>
        </div>

        <div class="card-body pt-6">
            <div class="table-responsive" style="overflow: hidden">
                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0" id="table_review">
                    <thead>
                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                            <th class="w-50px text-center">NO</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th>Rating</th>
                            <th>Image</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('metronic/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>
    <script>

        let reviewTable;
        $(document).ready(function() {
            reviewTable = $('#table_review').DataTable({
                processing: true,
                serverSide: true,
                retrieve: true,
                deferRender: true,
                responsive: false,
                ajax: {
                    url: "{{ route('review.table') }}",
                },
                language: {
                    "lengthMenu": "Show _MENU_",
                    "emptyTable": "Tidak ada data terbaru 📁",
                    "zeroRecords": "Data tidak ditemukan 😞",
                },
                buttons: [],
                dom: "<'row mb-2'" +
                    "<'col-12 col-lg-6 d-flex align-items-center justify-content-start'l B>" +
                    "<'col-12 col-lg-6 d-flex align-items-center justify-content-lg-end justify-content-start 'f>" +
                    ">" +

                    "<'table-responsive'tr>" +

                    "<'row'" +
                    "<'col-12 col-lg-5 d-flex align-items-center justify-content-center justify-content-lg-start'i>" +
                    "<'col-12 col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-end'p>" +
                    ">",
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'description'
                    },
                    {
                        data: 'rating'
                    },
                    {
                        data: 'image'
                    },
                    {
                        data: 'action'
                    }

                ],

                search: {
                    "regex": true
                },
                columnDefs: [{
                    targets: [0, 4],
                    className: 'text-center',
                }, ],
            });
        });


        //delete
        const onDeleteReview  = (id) => {
            Swal.fire({
                title: 'Delete!',
                text: `Apakah Anda yakin ingin menghapus?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgb(221, 107, 85)',
                cancelButtonColor: 'gray',
                confirmButtonText: 'Yes, Delete!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('review.delete') }}",
                        type: 'POST',
                        data: {
                            id
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(data) {
                            Swal.fire({
                                title: 'Success',
                                text: `${data.message}`,
                                icon: 'success',
                                confirmButtonColor: 'green',
                            });

                            reviewTable?.draw();
                        },
                        error: function(xhr, status, error) {
                            const data = xhr.responseJSON;
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.message,
                            });
                        }
                    });
                }
            });
        };
        //edit
        const onEditReview = (id, title, description, image, rating) => {
            $('#modal_edit_review').modal('show');
            $('#form_edit_review [name="id"]').val(id);
            $('#form_edit_review [name="title"]').val(title);
            $('#form_edit_review [name="description"]').val(description);
            $('#form_edit_review [name="image"]').val(image).trigger('change');
            $('#form_edit_review [name="rating"]').val(rating);
            
        };
    </script>
@endsection
