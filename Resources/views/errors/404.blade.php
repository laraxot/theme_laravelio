@title('Pagenotfound')

@extends('pub_theme::layouts.base', ['title' => 'Page not found'])

@section('body')
    <div class="my-20 text-center text-gray-800">
        <h1 class="text-5xl">{{ $title ?? '404'}}</h1>
        <p class="text-lg">The page you requested cannot be found.
            {{ $message ?? '' }}
            {{ $msg ?? '' }}
        </p>
    </div>
@endsection
