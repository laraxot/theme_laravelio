@title('Community Articles')
{{--
@canonical($canonical)
--}}

@extends('pub_theme::layouts.default')
@php($articles=$rows)

@section('content')

<nav aria-label="Page navigation example">
    <ul class="pagination pl-0">
        <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
</nav>

    <div class="bg-white pt-5 lg:pt-2">
        <div class="container mx-auto flex flex-col gap-x-12 px-4 lg:flex-row">
            <x-articles.featured :articles="$_theme->pinnedArticles()" />
        </div>
    </div>

    <div class="bg-lio-100">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-20 lg:px-8 lg:flex lg:items-center lg:justify-between">
            <h2 class="text-2xl font-extrabold tracking-tight text-gray-900 md:text-3xl">
                <span class="block">Got some knowledge to share?</span>
                <span class="block">
                    Share your article with <a href="https://twitter.com/laravelio" class="text-lio-500 hover:text-lio-600 hover:underline">our 45,000 Twitter followers</a>.
                </span>
            </h2>
            <div class="mt-8 flex lg:mt-0 lg:shrink-0">
                <div class="inline-flex rounded-md shadow">
                    <x-button.primary-button href="{{-- route('articles.create') --}}" class="px-5 py-3 text-base font-medium">
                        Share Your Article
                    </x-buttons.primary-button>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-5 pb-10 shadow-inner lg:pt-16 lg:pb-0" id="articles">
        <div class="container mx-auto flex flex-col gap-x-12 px-4 lg:flex-row">
            <div class="lg:w-3/4">
                <div class="flex justify-between items-center lg:block">
                    <div class="flex justify-between items-center">
                        <h1 class="text-4xl text-gray-900 font-bold">
                            Articles
                        </h1>
                    </div>

                    <div class="flex items-center justify-between lg:mt-6">
                        <h3 class="text-gray-800 text-xl font-semibold">
                            {{ number_format($articles->total()) }} Articles
                        </h3>

                        <div class="hidden lg:flex gap-x-2">
                            <x-articles.filter :selectedFilter="$_theme->filter()" :activeTag="$_theme->activeTag()" />

                            <div class="shrink-0">
                                <x-button.secondary-button class="flex items-center gap-x-2" @click="activeModal = 'tag-filter'">
                                    <x-svg icon="o-filter" class="w-5 h-5" />
                                    Tag filter
                                </x-buttons.secondary-button>
                            </div>
                        </div>
                    </div>

                    @if ($_theme->activeTag())
                        <div class="hidden lg:flex gap-x-4 items-center mt-4 pt-5 border-t">
                            Filter applied
                            <x-tag>
                                <span class="flex items-center gap-x-1">
                                    {{ $_theme->activeTag()->name() }}
                                    <a href="{{-- route('articles',['filter'=>$_theme->filter()]) --}}" type="button">
                                        <x-svg icon="o-x" class="w-5 h-5" />
                                    </a>
                                </span>
                            </x-tag>
                        </div>
                    @endisset
                </div>

                <div class="pt-2 lg:hidden">
                    @include('pub_theme::layouts._ads._forum_sidebar')

                    <div class="flex gap-x-4 mt-10">
                        <div class="w-1/2">
                            <x-button.secondary-cta class="w-full" @click="activeModal = 'tag-filter'">
                                <span class="flex items-center gap-x-2">
                                    <x-svg icon="o-filter" class="w-5 h-5" />
                                    Tag filter
                                </span>
                            </x-buttons.secondary-cta>
                        </div>

                        <div class="w-1/2">
                            <x-button.primary-cta href="{{-- route('articles.create') --}}" class="w-full">
                                Create Article
                            </x-buttons.primary-cta>
                        </div>
                    </div>

                    <div class="flex mt-4">
                        <x-articles.filter :selectedFilter="$_theme->filter()" :activeTag="$_theme->activeTag()" />
                    </div>

                    @if ($_theme->activeTag())
                        <div class="flex gap-x-4 items-center mt-4">
                            Filter applied
                            <x-tag>
                                <span class="flex items-center gap-x-1">
                                    {{ $_theme->activeTag()->name() }}
                                    <button type="button">
                                        <x-svg icon="o-x" class="w-5 h-5" />
                                    </button>
                                </span>
                            </x-tag>
                        </div>
                    @endif
                </div>

                <section class="mt-8 mb-5 lg:mb-16">
                    <div class="flex flex-col gap-y-4">
                        @foreach ($articles as $article)
                            <x-articles.overview-summary :article="$article" />
                        @endforeach
                    </div>

                    <div class="mt-10">
                        {{ $articles->appends(Request::only('filter', 'tag'))->onEachSide(1)->links() }}
                    </div>
                </section>

                <div class="modal" x-show="activeModal === 'tag-filter'" x-cloak>
                    <div class="w-full h-full p-8 lg:w-96 lg:h-3/4 overflow-y-scroll">
                        <x-tag-filter
                            :activeTag="$_theme->activeTag() ?? null"
                            :tags="$_theme->tags()"
                            :filter="$_theme->filter()"
                            route="articles"
                            cancelRoute="articles"
                            jumpTo="articles"
                        />
                    </div>
                </div>
            </div>

            <div class="lg:w-1/4">
                <div class="hidden lg:block">
                    @include('pub_theme::layouts._ads._forum_sidebar')
                </div>

                <div class="bg-white shadow rounded-md mt-6">
                    <h3 class="text-xl font-semibold px-5 pt-5">
                        Top authors
                    </h3>

                    <ul>
                        @foreach ($_theme->topAuthors() as $author)
                            <li class="{{ ! $loop->last ? 'border-b ' : '' }}pb-3 pt-5">
                                <div class="flex justify-between items-center px-5">
                                    <div class="flex items-center gap-x-5">
                                        <x-avatar :user="$author" class="w-10 h-10" />

                                        <span class="flex flex-col">
                                            <a href="{{-- route('profile',$author->username()) --}}" class="hover:underline">
                                                <span class="text-gray-900 font-medium">
                                                    {{ $author->username() }}
                                                </span>
                                            </a>

                                            <span class="text-gray-700">
                                                {{ $author->articles_count }} {{ Str::plural('Article', $author->articles_count) }}
                                            </span>
                                        </span>
                                    </div>

                                    <div>
                                        <span class="flex items-center gap-x-3 text-lio-500">
                                            <span class="text-xl font-medium">
                                                {{ $loop->iteration }}
                                            </span>

                                            <x-svg icon="trophy"  class="w-6 h-6" />
                                        </span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="mt-6">
                    <x-moderators :moderators="$_theme->moderators()" />
                </div>
            </div>
        </div>
    </div>
@endsection
