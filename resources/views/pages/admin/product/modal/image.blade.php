<div class="modal fade" id="modal_image_product" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header flex-stack align-items-center">
                <div class="fs-2 fw-bold">Gambar Produk</div>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <form class="modal-body pt-10 pb-15 px-lg-17" id="form_image_product">
                <div class="px-3" style="max-height: 400px; overflow-y: auto;">
                    <input type="text" name="id" hidden>

                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>Ganti gambar?</span>
                        </label>
                        <input type="file" class="form-control form-control-lg form-control-solid" name="image[]"
                            multiple placeholder="" value="">
                    </div>

                    <div class="fv-row mb-3">
                        <label class="d-flex align-items-center fs-5 fw-semibold mb-2">
                            <span>Preview</span>
                        </label>
                        <div id="image-container" class="d-flex flex-wrap"></div>
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
        $('#form_image_product [name="image[]"]').on('change', function() {
            const files = event.target.files;
            const imagePreviewContainer = $('#form_image_product #image-container');

            // Clear previous images
            imagePreviewContainer.empty();

            for (let i = 0; i < files.length; i++) {
                let file = files[i];
                let reader = new FileReader();

                reader.onload = function(e) {
                    let img = $('<img>').attr('src', e.target.result).css({
                        'max-width': '200px',
                        'margin': '10px'
                    });
                    imagePreviewContainer.append(img);
                }

                reader.readAsDataURL(file);
            }
        });

        $('#form_image_product').on('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            $('#form_image_product [type="submit"]').attr('disabled', true);
            $('#form_image_product [type="submit"]').html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
            );
            $.ajax({
                url: "{{ route('product.update.image') }}",
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    toastr.success(data.message, 'Selamat 🚀 !');
                    $('#form_image_product [type="submit"]').attr('disabled', false);
                    $('#form_image_product [type="submit"]').html('Simpan')
                    $('#modal_image_product').modal('hide');

                    $('#form_image_product').trigger('reset');
                    productTable?.draw();
                },
                error: function(xhr, status, error) {
                    const data = xhr.responseJSON;
                    toastr.error(data.message, 'Opps!');
                    $('#form_image_product [type="submit"]').attr('disabled', false);
                    $('#form_image_product [type="submit"]').html('Simpan')
                }
            });
        });
    });
</script>
