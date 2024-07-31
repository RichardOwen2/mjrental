<div class="d-flex justify-content-center align-items-center gap-2">
    <button class="btn btn-sm btn-icon btn-danger w-30px h-30px" onclick="onDeleteOrder('{{ $query->id }}')">
        <span class="fa fa-times"></span>
    </button>
    <button class="btn btn-sm btn-icon btn-warning w-30px h-30px"
        onclick="onEditOrder(
        '{{ $query->id }}',
        '{{ $query->product_id }}',
        '{{ $query->customer_name }}',
        '{{ $query->date_in }}',
        '{{ $query->date_out }}',
        '{{ $query->description }}',
        '{{ $query->status }}'
    )">
        <span class="fa fa-pen"></span>
    </button>
    @if ($query->status == 'Open')
        <button class="btn btn-sm btn-icon btn-success w-30px h-30px"
            onclick="onUpdateStatus('{{ $query->id }}', 'Close')">
            <span class="fa fa-check"></span>
        </button>
    @else
        <button class="btn btn-sm btn-icon btn-success w-30px h-30px"
            onclick="onUpdateStatus('{{ $query->id }}', 'Open')">
            <span class="fa fa-check"></span>
        </button>
    @endif
    <button class="btn btn-sm btn-icon btn-primary w-30px h-30px" onclick="onViewAttachment('{{ $query->id }}')">
        <span class="fa fa-image"></span>
    </button>
</div>
