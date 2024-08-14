@switch($status)
    @case('Open')
        <span class="badge badge-light-success">Rented</span>
    @break

    @case('Close')
        <span class="badge badge-light-danger">Finished</span>
    @break
@endswitch
