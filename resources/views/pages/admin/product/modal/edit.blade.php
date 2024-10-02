<div class="modal fade" id="modal_edit_product" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-950px">
        <div class="modal-content">
            <div class="modal-header flex-stack align-items-center">
                <div class="fs-2 fw-bold">Edit Produk</div>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <form class="modal-body pt-10 pb-15 px-lg-17" id="form_edit_product">
                <div class="px-3" style="max-height: 400px; overflow-y: auto;">
                    <input type="text" name="id" hidden>

                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Tipe Produk</span>
                        </label>
                        <select name="type_id" class="form-select form-select-solid" data-control="select2"
                            data-hide-search="true" data-placeholder="">
                            <option selected hidden disabled>Pilih Dulu</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->id }}">
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Nama Produk</span>
                        </label>
                        <input type="text" class="form-control form-control-lg form-control-solid" name="name"
                            required placeholder="" value="">
                    </div>

                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Nomor Plat</span>
                        </label>
                        <div class="d-flex">
                            <input type="text" class="form-control form-control-lg form-control-solid" name="number[]"
                                required placeholder="" value="">
                            <button class="btn btn-sm btn-success">
                                <i class="fa fa-plus fs-3"></i>
                            </button>
                        </div>
                    </div>

                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span class="required">Harga</span>
                        </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text border-0">Rp</span>
                            <input type="text" class="form-control form-control-solid" required name="price_day" />
                            <span class="input-group-text border-0">/ Hari</span>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text border-0">Rp</span>
                            <input type="text" class="form-control form-control-solid" required name="price_week" />
                            <span class="input-group-text border-0">/ Minggu</span>
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text border-0">Rp</span>
                            <input type="text" class="form-control form-control-solid" required name="price_month" />
                            <span class="input-group-text border-0">/ Bulan</span>
                        </div>
                    </div>

                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>Ganti Foto Cover?</span>
                        </label>
                        <input type="file" class="form-control form-control-lg form-control-solid" name="cover"
                            placeholder="" value="">
                    </div>

                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>Deskripsi</span>
                        </label>
                        <textarea type="text" class="form-control form-control-lg form-control-solid" name="description" data-control="tinymce"
                            placeholder="" value="" id="edit_description"></textarea>
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
        $('#form_edit_product').on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            $('#form_edit_product [type="submit"]').attr('disabled', true);
            $('#form_edit_product [type="submit"]').html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $.ajax({
                url: "{{ route('product.update') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    toastr.success(data.message, 'Selamat 🚀 !');
                    $('#form_edit_product [type="submit"]').attr('disabled', false);
                    $('#form_edit_product [type="submit"]').html('Simpan')
                    $('#modal_edit_product').modal('hide');

                    $('#form_edit_product').trigger('reset');
                    productTable?.draw();
                },
                error: function(xhr, status, error) {
                    const data = xhr.responseJSON;
                    toastr.error(data.message, 'Opps!');
                    $('#form_edit_product [type="submit"]').attr('disabled', false);
                    $('#form_edit_product [type="submit"]').html('Simpan')
                }
            });
        });
    });
</script>
