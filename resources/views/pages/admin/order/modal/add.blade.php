<div class="modal fade" id="modal_add_order" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-950px">
        <div class="modal-content">
            <div class="modal-header flex-stack align-items-center">
                <div class="fs-2 fw-bold">Tambah Order</div>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <form class="modal-body pt-10 pb-15 px-lg-17" id="form_add_order">
                <div class="px-3" style="max-height: 400px; overflow-y: auto;">
                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Produk</span>
                        </label>
                        <select name="product_number_id" class="form-select form-select-solid" data-control="select2"
                            data-placeholder="" required data-dropdown-parent="#modal_add_order">
                            <option selected hidden disabled>Pilih Dulu</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">
                                    [{{ $product->number }}] {{ $product->product->name }} -
                                    {{ $product->product->type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Nama Customer</span>
                        </label>
                        <input type="text" class="form-control form-control-lg form-control-solid" name="customer_name"
                            required placeholder="" value="">
                    </div>

                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>Date In</span>
                        </label>
                        <input type="datetime-local" class="form-control form-control-lg form-control-solid" name="date_in"
                            placeholder="" value="">
                    </div>

                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>Date Out</span>
                        </label>
                        <input type="datetime-local" class="form-control form-control-lg form-control-solid" name="date_out"
                            placeholder="" value="">
                    </div>

                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>Deskripsi</span>
                        </label>
                        <input type="text" class="form-control form-control-lg form-control-solid" name="description"
                            placeholder="" value="">
                    </div>

                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Status</span>
                        </label>
                        <select name="status" class="form-select form-select-solid" data-control="select2"
                            data-hide-search="true" data-placeholder="">
                            <option selected value="Open">Rented</option>
                            <option value="Close">Finished</option>
                        </select>
                    </div>

                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>Attachments</span>
                        </label>
                        <input type="file" class="form-control form-control-lg form-control-solid"
                            name="attachments[]" multiple placeholder="" value="">
                    </div>
                </div>

                <div class="text-center mt-9">
                    <button type="reset" class="btn btn-sm btn-light me-3 w-lg-200px"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-info w-lg-200px">
                        <span class="indicator-label">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#form_add_order [name="date_in"]').val(moment().format('YYYY-MM-DD'));

        $('#form_add_order').on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            $('#form_add_order [type="submit"]').attr('disabled', true);
            $('#form_add_order [type="submit"]').html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $.ajax({
                url: "{{ route('order.store') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    toastr.success(data.message, 'Selamat 🚀 !');
                    $('#form_add_order [type="submit"]').attr('disabled', false);
                    $('#form_add_order [type="submit"]').html('Simpan')
                    $('#modal_add_order').modal('hide');

                    $('#form_add_order').trigger('reset');
                    orderTable?.draw();
                },
                error: function(xhr, status, error) {
                    const data = xhr.responseJSON;
                    toastr.error(data.message, 'Opps!');
                    $('#form_add_order [type="submit"]').attr('disabled', false);
                    $('#form_add_order [type="submit"]').html('Simpan')
                }
            });
        });
    });
</script>
