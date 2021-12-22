{{-- @title('CommunityArticles') --}}

@extends('pub_theme::layouts.default', ['isTailwindUi' => true, 'title' => 'Community Articles'])

@section('content')
    <div class="bg-white pt-5 lg:pt-2">
        <div class="container mx-auto flex flex-col gap-x-12 px-4 lg:flex-row">
            <x-articles.featured :articles="$_theme->pinnedArticles()" />
        </div>
    </div>

    <div class="pt-5 pb-10 shadow-inner lg:pt-16 lg:pb-0">
        <div class="container mx-auto flex flex-col gap-x-12 px-4 lg:flex-row">
            <div class="lg:w-3/4">
                <livewire:theme::show-articles />
            </div>

            <div class="lg:w-1/4">
                <div class="hidden lg:block">
                    @include('pub_theme::layouts._ads._forum_sidebar')
                </div>
                <div class="mt-6">
                    <x-moderators :moderators="$_theme->moderators()" />
                </div>
            </div>
        </div>
    </div>
@endsection
