{{-- <head>
	{!! Theme::metatags() !!}
	@php
	//Bootstrap core CSS
	Theme::add('/theme/pub/css/bootstrap.min.css',1);
	Theme::add('/theme/pub/css/font-awesome.min.css');
	Theme::add('/theme/pub/css/style-child.css');
	//Theme::add('/theme/pub/css/animsition.min.css');
	//Theme::add('/theme/pub/js/animsition.min.js');
	Theme::add('/theme/bc/animsition/dist/css/animsition.min.css');
	Theme::add('/theme/bc/animsition/dist/js/animsition.min.js');

	Theme::add('/theme/pub/css/animate.css');
	//Custom styles for this template
	Theme::add('/theme/pub/css/style.css');
	Theme::add('/theme/bc/cookieconsent/build/cookieconsent.min.css');
    Theme::add('/theme/bc/cookieconsent/build/cookieconsent.min.js');
    Theme::add('/theme/pub/css/xot.css');
	@include('pub_theme::manychat.snip01')
    @endphp
	{!! Theme::showStyles(false) !!}
    @stack('styles')
    @yield('cssAdd')
</head> --}}

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ isset($title) ? $title . ' | ' : '' }}
        {{ config('app.name') }}
        {{ is_active('home') ? '- The Laravel Community Portal' : '' }}
    </title>

    <meta name="description"
        content="The Laravel portal for problem solving, knowledge sharing and community building." />

    <!-- Scripts -->
    {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
    {{-- <script src="{{ Theme::asset('pub_theme::dist/js/app.js') }}" defer></script> --}}
    <!-- Styles -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ Theme::asset('pub_theme::dist/css/app.css') }}" rel="stylesheet">
    @stack('meta')

    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
    {{-- vedere quale pacchetto
    @include('feed::links') --}}
    @include('pub_theme::layouts._favicons')
    @include('pub_theme::layouts._social')
    @include('pub_theme::layouts._fathom')

    {!! Theme::showStyles(false) !!}
    @livewireStyles
    @stack('styles')
    
</head>
