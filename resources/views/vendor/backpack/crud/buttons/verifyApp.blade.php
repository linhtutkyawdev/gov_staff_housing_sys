@if ($crud->hasAccess('update', $entry) && $entry->verified == false)
    <a href="{{ url($crud->route . '/' . $entry->getKey() . '/verify') }}"
        class="btn btn-xs btn-link fs-5 d-flex text-center"><i class="la la-check mx-1"></i>
        Verify</a>
@endif
