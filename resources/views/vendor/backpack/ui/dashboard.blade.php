@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type' => 'jumbotron',
    ];
@endphp

@section('content')
    <script>
        window.location = '/admin/info'
    </script>
@endsection
