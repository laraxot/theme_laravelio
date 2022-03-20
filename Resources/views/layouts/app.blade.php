<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
@include('pub_theme::layouts.partials.htmlheader')

<body
    class="{{ $bodyClass ?? '' }} {{ isset($isTailwindUi) && $isTailwindUi ? '' : 'standard' }} font-sans bg-white antialiased"
    x-data="{ activeModal: null }" @close-modal.window="activeModal = false"
    @open-modal.window="activeModal = $event.detail">

  

    @include('pub_theme::layouts._ads._banner')
    @include('pub_theme::layouts._nav')

    @yield('body')
    @yield('content')

    @include('pub_theme::layouts._footer')

    @stack('modals')

    @include('pub_theme::layouts.partials.scripts')


</body>

</html>
