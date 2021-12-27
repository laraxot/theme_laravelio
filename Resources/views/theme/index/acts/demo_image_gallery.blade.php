@title('Demo Gallery')
@extends('pub_theme::layouts.app', ['isTailwindUi' => false])
@section('content')
    @livewire('theme::demo-image-gallery')
@endsection
