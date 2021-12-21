<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ isset($title) ? $title.' | ' : '' }}
        {{ config('app.name') }}
        {{ is_active('home') ? '- The Laravel Community Portal' : '' }}
    </title>

    <meta name="description" content="The Laravel portal for problem solving, knowledge sharing and community building." />

    <!-- Scripts -->
    {{--  
    <script src="{{ mix('js/app.js') }}" defer></script>
    --}}
    <script src="{{ Theme::asset('pub_theme::dist/js/app.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    {{--  
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    --}}
    <link href="{{ Theme::asset('pub_theme::dist/css/app.css') }}" rel="stylesheet">
    @stack('meta')

    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
    {{-- vedere quale pacchetto   
    @include('feed::links')
    --}}
    @include('pub_theme::layouts._favicons')
    @include('pub_theme::layouts._social')
    @include('pub_theme::layouts._fathom')

    @livewireStyles
</head>

<body class="{{ $bodyClass ?? '' }} {{ isset($isTailwindUi) && $isTailwindUi ? '' : 'standard' }} font-sans bg-white antialiased" x-data="{ activeModal: null }" @close-modal.window="activeModal = false"  @open-modal.window="activeModal = $event.detail">

@include('pub_theme::layouts._ads._banner')
@include('pub_theme::layouts._nav')

@yield('body')
@yield('content')

@include('pub_theme::layouts._footer')

@stack('modals')

@livewireScripts

</body>
</html>
