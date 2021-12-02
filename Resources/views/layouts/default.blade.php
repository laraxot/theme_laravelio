@extends('pub_theme::layouts.base')

@section('body')
    <div class="bg-gray-100">
        @include('pub_theme::layouts._alerts')

        @yield('content')
    </div>
@endsection
