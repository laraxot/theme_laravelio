{{-- @title('Forbidden') --}}
@extends('pub_theme::layouts.base',['title'=>'Forbidden'])

@section('body')
    <div class="my-20 text-center text-gray-800">
        <h1 class="text-5xl">{{-- $title??$message --}}</h1>
        <p class="text-lg">You're not allowed to this page.</p>
    </div>
@endsection
