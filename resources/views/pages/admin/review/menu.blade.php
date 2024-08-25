<div class="d-flex justify-content-center align-items-center gap-2">
    <button class="btn btn-sm btn-icon btn-danger w-30px h-30px" onclick="onDeleteReview('{{ $query->id }}')">
        <span class="fa fa-times"></span>
    </button>
    <button class="btn btn-sm btn-icon btn-warning w-30px h-30px"
        onclick="onEditReview(
        '{{ $query->id }}',
        '{{ $query->title }}',
        '{{ $query->description }}',
        `{{ asset('storage/article/' . $query->image) }}`,
        '{{ $query->rating }}',
    )">
        <span class="fa fa-pen"></span>
    </button>
</div>
