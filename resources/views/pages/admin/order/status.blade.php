@switch($status)
    @case('Open')
        <span class="badge badge-light-success">Open</span>
    @break

    @case('Close')
        <span class="badge badge-light-danger">Close</span>
    @break
@endswitch
