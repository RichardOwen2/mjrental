@switch($status)
    @case('Open')
        <span class="badge badge-success">{{ $priority }}</span>
    @break

    @case('Close')
        <span class="badge badge-warning">{{ $priority }}</span>
    @break
@endswitch
