@extends('layouts.admin.app')

@section('modal')
    @include('pages.admin.order.modal.add')
    @include('pages.admin.order.modal.edit')
    @include('pages.admin.order.modal.attachment')
    @include('pages.admin.order.modal.export')
@endsection

@section('content')
    <div class="card card-flush h-md-100">
        <div class="card-header">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">List Order</span>
            </h3>

            <div class="card-toolbar">
                <a href="#" class="btn btn-sm btn-success me-2" data-bs-toggle="modal"
                    data-bs-target="#modal_export_order">
                    Export
                </a>
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_order">
                    Tambah Order
                </a>
            </div>
        </div>

        <div class="card-body pt-6">
            <ul class="nav nav-pills mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="fw-semibold btn-sm btn btn-light-success btn-color-success rounded active position-relative"
                        data-bs-toggle="tab" onclick="changeQuery('filter', 'Open')" id="filter_open"
                        href="#filter_open_content" aria-selected="true" role="tab">
                        Rented
                    </a>
                </li>
                <li class="nav-item">
                    <a class="fw-semibold btn-sm btn btn-light-danger btn-color-danger rounded position-relative"
                        data-bs-toggle="tab" onclick="changeQuery('filter', 'Close')" id="filter_close"
                        href="#filter_close_content" aria-selected="false" tabindex="-1" role="tab">
                        Finished
                    </a>
                </li>
                <li class="nav-item">
                    <a class="fw-semibold btn-sm btn btn-light-primary btn-color-primary rounded position-relative"
                        data-bs-toggle="tab" onclick="changeQuery('filter', 'All')" id="filter_all"
                        href="#filter_all_content" aria-selected="true" role="tab">
                        All
                    </a>
                </li>
            </ul>

            <div class="table-responsive" style="overflow: hidden">
                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0" id="table_order">
                    <thead>
                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                            <th class="w-50px text-center">NO</th>
                            <th>PRODUK</th>
                            <th>TIPE</th>
                            <th>PLAT</th>
                            <th>DATE IN</th>
                            <th>DATE OUT</th>
                            <th>STATUS</th>
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
        let orderTable;
        let status = 'Open';

        const changeQuery = (type, value) => {
            status = value;
            orderTable?.ajax.reload();
        }

        const onDeleteOrder = (id) => {
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
                        url: "{{ route('order.delete') }}",
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

                            orderTable?.draw();
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

        const onUpdateStatus = (id, status) => {
            Swal.fire({
                title: status == 'Open' ? 'Open?' : 'Close?',
                text: `Apakah Anda yakin ingin ${status == 'Open' ? 'membuka' : 'menutup'} order ini?`,
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: 'green',
                cancelButtonColor: 'gray',
                confirmButtonText: 'Yes, Update!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('order.update.status') }}",
                        type: 'POST',
                        data: {
                            id,
                            status
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

                            orderTable?.draw();
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

        const onViewAttachment = (id) => {
            $('#modal_attachment_order').modal('show');

            $.ajax({
                url: "{{ route('order.attachment', '') }}" + "/" + id,
                type: 'GET',
                data: {
                    id
                },
                success: function(data) {
                    const imageContainer = $('#modal_attachment_order #attachment_list');
                    imageContainer.empty();

                    if (data.data.length == 0) {
                        imageContainer.append('<div class="text-center fw-bold fs-3">No Attachment</div>');
                        return;
                    }

                    data.data.forEach((image) => {
                        const img = $('<img>').attr('src',
                            '{{ asset('public/uploads/public/order/attachment/') }}/' + image.attachment)
                    .css({
                            'max-width': '300px',
                            'margin': '10px'
                        });

                        const a = $('<a>').attr('href',
                                '{{ asset('public/uploads/public/order/attachment/') }}/' + image.attachment)
                            .attr('target', '_blank').append(img);
                        imageContainer.append(a);
                    });
                },
                error: function(xhr, status, error) {
                    const data = xhr.responseJSON;
                    toastr.error(data.message, 'Opps!');
                }
            });
        }

        const onEditOrder = (id, product_number_id, customer_name, date_in, date_out, description, status) => {
            $('#modal_edit_order').modal('show');
            $('#form_edit_order [name="id"]').val(id);
            $('#form_edit_order [name="product_number_id"]').val(product_number_id).trigger('change');
            $('#form_edit_order [name="customer_name"]').val(customer_name);
            $('#form_edit_order [name="date_in"]').val(date_in);
            $('#form_edit_order [name="date_out"]').val(date_out);
            $('#form_edit_order [name="description"]').val(description);
            $('#form_edit_order [name="status"]').val(status).trigger('change');
        };

        $(document).ready(function() {
            orderTable = $('#table_order').DataTable({
                processing: true,
                serverSide: true,
                retrieve: true,
                deferRender: true,
                responsive: false,
                ajax: {
                    url: "{{ route('order.table') }}",
                    data: function(d) {
                        d.status = status;
                    }
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
                        data: 'type_name'
                    },
                    {
                        data: 'product_number',
                    },
                    {
                        data: 'date_in',
                    },
                    {
                        data: 'date_out',
                    },
                    {
                        data: 'status',
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
                    targets: [0, 8],
                    className: 'text-center',
                }, ],
            });
        });
    </script>
@endsection
