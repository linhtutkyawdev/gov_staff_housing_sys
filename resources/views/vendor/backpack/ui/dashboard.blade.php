@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type' => 'jumbotron',
    ];
@endphp

@section('content')
    <p>Your custom HTML can live here</p>
@endsection
