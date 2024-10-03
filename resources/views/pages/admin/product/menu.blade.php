<div class="d-flex justify-content-center align-items-center gap-2">
    <button class="btn btn-sm btn-icon btn-danger w-30px h-30px" onclick="onDeleteProduct('{{ $query->id }}')">
        <span class="fa fa-times"></span>
    </button>
    <button class="btn btn-sm btn-icon btn-warning w-30px h-30px"
        onclick="onEditProduct(
        '{{ $query->id }}',
        '{{ $query->type_id }}',
        '{{ $query->name }}',
        '{{ $query->number }}',
        '{{ $query->price_day }}',
        '{{ $query->price_week }}',
        '{{ $query->price_month }}',
        `{{ $query->description }}`
    )">
        <span class="fa fa-pen"></span>
    </button>
    <button class="btn btn-sm btn-icon btn-primary w-30px h-30px" onclick="onViewImage('{{ $query->id }}')">
        <span class="fa fa-image"></span>
    </button>
    <a class="btn btn-sm btn-icon btn-info w-30px h-30px" href="{{ route('product.detail.index', ['id' => $query->id]) }}">
        <span class="fa fa-eye"></span>
    </a>
</div>
