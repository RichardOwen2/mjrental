@extends('layouts.admin.app')

@section('modal')
    @include('pages.admin.product.modal.add')
    @include('pages.admin.product.modal.edit')
    @include('pages.admin.product.modal.image')
@endsection

@section('content')
    <div class="card card-flush h-md-100">
        <div class="card-header pt-7">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">List Produk</span>
            </h3>

            <div class="card-toolbar">
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_product">
                    Tambah Produk
                </a>
            </div>
        </div>

        <div class="card-body pt-6">
            <div class="table-responsive" style="overflow: hidden">
                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0" id="table_product">
                    <thead>
                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                            <th class="w-50px text-center">NO</th>
                            <th>NAMA</th>
                            <th>TIPE</th>
                            <th>PLAT</th>
                            <th>HARGA</th>
                            <th>DESKRIPSI</th>
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
        let productTable;

        const onDeleteProduct = (id) => {
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
                        url: "{{ route('product.delete') }}",
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

                            productTable?.draw();
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

        const onEditProduct = (id, type_id, name, number, price_day, price_week, price_month, description) => {
            $('#modal_edit_product').modal('show');
            $('#form_edit_product [name="id"]').val(id);
            $('#form_edit_product [name="type_id"]').val(type_id).trigger('change');
            $('#form_edit_product [name="name"]').val(name);
            $('#form_edit_product [name="number"]').val(number);
            $('#form_edit_product [name="price_day"]').val(price_day);
            $('#form_edit_product [name="price_week"]').val(price_week);
            $('#form_edit_product [name="price_month"]').val(price_month);
            $('#form_edit_product [name="description"]').val(description);
        };

        const onViewImage = (id) => {
            $('#modal_image_product [name="id"]').val(id);
            $('#modal_image_product').modal('show');
            $.ajax({
                url: "{{ route('product.image', '') }}" + "/" + id,
                type: 'GET',
                success: function(data) {
                    const imageContainer = $('#modal_image_product #image-container');
                    imageContainer.empty();

                    data.data.forEach((image) => {
                        const img = $('<img>').attr('src', '{{ asset("storage/product/image/") }}/' + image.image).css({
                            'max-width': '200px',
                            'margin': '10px'
                        });

                        const a = $('<a>').attr('href', '{{ asset("storage/product/image/") }}/' + image.image).attr('target', '_blank').append(img);
                        imageContainer.append(a);
                    });
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
        };

        $(document).ready(function() {
            productTable = $('#table_product').DataTable({
                processing: true,
                serverSide: true,
                retrieve: true,
                deferRender: true,
                responsive: false,
                ajax: {
                    url: "{{ route('product.table') }}",
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
                        data: 'name'
                    },
                    {
                        data: 'type_name',
                    },
                    {
                        data: 'number',
                    },
                    {
                        data: 'price',
                    },
                    {
                        data: 'description',
                    },
                    {
                        data: 'action'
                    }
                ],
                search: {
                    "regex": true
                },
                columnDefs: [{
                    targets: [0, 6],
                    className: 'text-center',
                }, ],
            });
        });
    </script>
@endsection
