<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!--====== Title ======-->
    <title>{{ __('messages.TITLE_SHORT') }}</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/logo.svg" type="image/svg">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <x-external-css />
</head>

<body class="bg-slate-100">
    <!--[if IE]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
    <![endif]-->

    <x-preloader />

    <livewire:welcome.gather-info />

    <x-external-js />
</body>

</html>
