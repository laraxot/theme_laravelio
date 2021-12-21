@extends('pub_theme::layouts.base')
@section('body')
    @livewire('forum::thread.create', ['model' => 'thread'])
@endsection
