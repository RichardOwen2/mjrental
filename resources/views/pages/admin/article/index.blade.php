@extends('layouts.admin.app')

@section('modal')
    @include('pages.admin.article.modal.add')
    @include('pages.admin.article.modal.edit')
@endsection

@section('content')
    <div class="card card-flush h-md-100">
        <div class="card-header pt-7">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">Konten</span>
            </h3>

            <div class="card-toolbar">
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_article">
                    Tambah Konten
                </a>
            </div>
        </div>

        <div class="card-body pt-6">
            <div class="table-responsive" style="overflow: hidden">
                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0" id="table_article">
                    <thead>
                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                            <th class="w-50px text-center">NO</th>
                            <th>JUDUL</th>
                            <th>SUB JUDUL</th>
                            <th>URUTAN</th>
                            <th class="text-center">ACTION</th>
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
    <script>
        let articleTable;

        const onDeleteArticle = (id) => {
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
                        url: "{{ route('article.delete') }}",
                        Article: 'POST',
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

                            articleTable?.draw();
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

        const onEditArticle = (id, title, content, position, image) => {
            $('#form_edit_article [name="id"]').val(id);
            $('#form_edit_article [name="title"]').val(title);
            $('#form_edit_article [name="content"]').val(content);
            $('#form_edit_article [name="position"]').val(position);

            const imagePreviewContainer = $('#form_edit_article #image-preview-container');
            imagePreviewContainer.empty();

            let img = $('<img>').attr('src', image).css({
                'max-width': '500px',
                'margin': '10px'
            });

            imagePreviewContainer.append(img);

            $('#modal_edit_article').modal('show');
        }

        $(document).ready(function() {
            articleTable = $('#table_article').DataTable({
                processing: true,
                serverSide: true,
                retrieve: true,
                deferRender: true,
                responsive: false,
                ajax: {
                    url: "{{ route('article.table') }}",
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
                        data: 'content',
                    },
                    {
                        data: 'position',
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
    </script>
@endsection
