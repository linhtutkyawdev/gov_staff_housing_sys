@if ($crud->hasAccess('update', $entry))
    <a href="{{ url($crud->route . '/' . $entry->getKey() . '/verify') }}" class="btn btn-xs btn-link d-flex mb-1"><i
            class="la la-check mx-2"></i>
        Verify Application</a>
@endif
