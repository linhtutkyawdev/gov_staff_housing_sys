@if ($crud->hasAccess('update', $entry))
    <a href="{{ url($crud->route . '/' . $entry->getKey() . '/getInfo') }}" class="btn btn-xs btn-link fs-5"><i
            class="la la-rocket mx-1"></i>
        Get Info</a>
@endif
