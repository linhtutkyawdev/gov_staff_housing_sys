{{-- This file is used for menu items by any Backpack v6 theme --}}

<x-backpack::menu-item title="Admins" icon="la la-user" :link="backpack_url('user')" />

<x-backpack::menu-item title="Applications" icon="la la-folder" :link="backpack_url('info')" />

<x-backpack::menu-item title="Verified Applications" icon="la la-star" :link="backpack_url('verified-application')" />

{{-- @foreach (config('languages') as $key => $language)
    @if ($key === app()->getLocale())
        @continue
    @endif
    <li class="nav-item"><a class="nav-link" href="{{ route('change-locale', ['locale' => $key]) }}"><i
                class="la la-cog nav-icon"></i>
            {{ strtoUpper($key) }}</a></li>
@endforeach --}}
