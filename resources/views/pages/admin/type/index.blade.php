@extends('layouts.admin.app')

@section('content')
    <div class="card card-flush h-md-100">
        <div class="card-header pt-7">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold text-gray-800">List Tipe</span>
            </h3>

            <div class="card-toolbar">
                <a href="/metronic8/demo31/apps/ecommerce/catalog/add-product.html" class="btn btn-sm btn-light">History</a>
            </div>
        </div>

        <div class="card-body pt-6">
            <div class="table-responsive" style="overflow: hidden">
                <table class="table table-row-dashed align-middle gs-0 gy-3 my-0" id="table_type">
                    <thead>
                        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
                            <th class="w-50px text-center">NO</th>
                            <th>NAMA TIPE</th>
                            <th>JUMLAH PRODUK</th>
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
        let typeTable;

        $(document).ready(function() {
            causesTable = $('#table_type').DataTable({
                processing: true,
                serverSide: true,
                retrieve: true,
                deferRender: true,
                responsive: false,
                ajax: {
                    url: "{{ route('type.table') }}",
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
                        data: 'product_count',
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
