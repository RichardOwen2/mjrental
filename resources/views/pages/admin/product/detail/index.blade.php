@extends('layouts.admin.app')

@section('modal')
    @include('pages.admin.product.detail.modal.add-number')
    @include('pages.admin.product.detail.modal.edit-number')
@endsection

@section('content')
    <div class="card card-flush h-md-50">
        <div class="card-header border-0 pt-6 d-flex justify-items-between">
            <div class="d-flex align-items-center gap-2 mb-3 mb-md-0">
                <div class="d-flex align-items-center">
                    <span class="fs-7 fw-bolder pe-4 text-nowrap">
                        Detail Produk
                    </span>
                </div>
            </div>
        </div>
        <div class="card-body pt-0 row">
            <div class="col-lg-6">
                <div class="mb-2">
                    <div style="font-size: 12px">Tipe</div>
                    <div class="fw-bold" style="font-size: 20px">
                        {{ $query->type->name }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-2">
                    <div style="font-size: 12px">Nama Produk</div>
                    <div class="fw-bold" style="font-size: 20px">
                        {{ $query->name }}
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-2">
                    <div style="font-size: 12px">Harga</div>

                    <div class="fw-bold" style="font-size: 20px">
                        {{ 'Rp ' . \App\Helpers::numberFormat($query->price_day) . ' / Rp ' . \App\Helpers::numberFormat($query->price_week) . ' / Rp ' . \App\Helpers::numberFormat($query->price_month) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card pt-5">
        <div class="d-flex justify-content-between">
            <div class="d-grid">
                <ul class="nav nav-tabs flex-nowrap text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold btn btn-active-light btn-color-muted btn-active-color-info rounded-bottom-0 active"
                            data-bs-toggle="tab" href="#order">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold btn btn-active-light btn-color-muted btn-active-color-success rounded-bottom-0"
                            data-bs-toggle="tab" href="#plat">Plat</a>
                    </li>
                </ul>
            </div>
            <div class="card-toolbar">
                <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal_add_product_number">
                    Tambah Plat
                </a>
            </div>
        </div>

        <div class="tab-content mt-5" id="myTabContent">
            <div class="tab-pane fade show active" id="order" role="tabpanel">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table align-top border table-rounded gy-5" id="table_order">
                            <thead class="">
                                <tr class="fw-bold fs-7 text-gray-500 text-uppercase overflow-y-auto">
                                    <th class="text-center w-50px">#</th>
                                    <th>PLAT</th>
                                    <th>DATE IN</th>
                                    <th>DATE OUT</th>
                                    <th>STATUS</th>
                                    <th>DESKRIPSI</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="fs-7">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="plat" role="tabpanel">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table align-top border table-rounded gy-5" id="table_number">
                            <thead class="">
                                <tr class="fw-bold fs-7 text-gray-500 text-uppercase overflow-y-auto">
                                    <th class="text-center w-50px">#</th>
                                    <th>PLAT</th>
                                    <th>ORDER COUNT</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="fs-7">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let orderTable;
        let numberTable;

        const onDeleteProductNumber = (id) => {
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
                        url: "{{ route('product.detail.delete.number', ['id' => $query->id]) }}",
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

        const onEditProductNumber = (id, number) => {
            $('#modal_edit_product_number').modal('show');
            $('#form_edit_product_number [name="id"]').val(id);
            $('#form_edit_product_number [name="number"]').val(number);
        }

        $(document).ready(function() {
            orderTable = $('#table_order').DataTable({
                processing: true,
                serverSide: true,
                retrieve: true,
                deferRender: true,
                responsive: false,
                ajax: {
                    url: "{{ route('product.detail.order', ['id' => $query->id]) }}",
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

            numberTable = $('#table_number').DataTable({
                processing: true,
                serverSide: true,
                retrieve: true,
                deferRender: true,
                responsive: false,
                ajax: {
                    url: "{{ route('product.detail.number', ['id' => $query->id]) }}",
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
                        data: 'number',
                    },
                    {
                        data: 'order_count',
                    },
                    {
                        data: 'action'
                    }
                ],
                search: {
                    "regex": true
                },
                columnDefs: [{
                    targets: [0, 3],
                    className: 'text-center',
                }, ],
            });
        });
    </script>
@endsection
