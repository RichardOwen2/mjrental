<div class="modal fade" id="modal_export_order" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header flex-stack align-items-center">
                <div class="fs-2 fw-bold">Export Order</div>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-outline ki-cross fs-1"></i>
                </div>
            </div>
            <form class="modal-body pt-10 pb-15 px-lg-17" id="form_export_order">
                <div class="px-3" style="max-height: 400px; overflow-y: auto;">
                    <div class="col-lg-12 mt-3 mb-3">
                        <label class="d-flex align-items-center fs-6 form-label mb-2">
                            <span class="required fw-bold">Periode Order</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text border-0"><i class="fa-solid fa-calendar"></i></span>
                            <input class="form-control form-control-solid form-control-md" autocomplete="off" name="range_date_export" id="range_date_export" required>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-9">
                    <button type="reset" class="btn btn-sm btn-light me-3 w-lg-200px"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-info w-lg-200px">
                        <span class="indicator-label">Export</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('input[name="range_date_export"]').daterangepicker({
            autoUpdateInput: false,
            opens: 'left',
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, (from_date, to_date) => {
            $('input[name="range_date_export"]').val(from_date.format('MM/DD/YYYY') + ' - ' + to_date.format('MM/DD/YYYY'));
        });

        $('#form_export_order').on('submit', function(e) {
            e.preventDefault();
            const range_date_export = encodeURIComponent($('#range_date_export').val());

            window.open(`{{ route('order.export') }}?date=${range_date_export}`, '_blank');
        });
    });
</script>
