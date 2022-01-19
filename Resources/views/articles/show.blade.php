@php
$article = $row;
@endphp

@title($article->title())
{{-- @shareImage(route('articles.image', $article->slug())) --}}
@extends('pub_theme::layouts.app')

@push('meta')
    <link rel="canonical" href="{{ $article->canonicalUrl() }}" />
@endpush




@section('content')
    <article class="bg-white">

        <div class="w-full bg-center bg-cover bg-gray-900"
            style="background-image: linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url({{ $article->heroImage(2000, 384) }});">
            <div class="container mx-auto">
                <div class="px-4 lg:px-0 lg:mx-48">
                    <div class="flex items-center justify-between pt-6 mb-28">
                        <a href="{{ $_panel->url(['act' => 'index']) }}"
                            class="hidden flex items-center text-base text-white hover:underline lg:flex">
                            <x-svg icon="s-arrow-leftclass"="w-4h-4fill-current" />
                            <span class="text-white ml-1 hover:text-gray-100">Back to articles</span>
                        </a>

                        <div class="hidden lg:flex">
                            @if ($article->isNotPublished())

                                @if ($article->isAwaitingApproval())
                                    Awaiting Approval
                                @else
                                    Draft
                                @endif

                            @endif
                        </div>

                    </div>


                    <div class="flex flex-wrap gap-2 lg:gap-x-4 mb-4">
                        @foreach ($article->tags as $tag)

                            {{ $tag->title }}

                        @endforeach
                    </div>


                    <h1 class="text-white text-5xl font-bold mb-4">
                        {{ $article->title }}
                    </h1>

                    <div class="flex flex-col gap-y-2 text-white pb-4 lg:pb-12 lg:flex-row lg:items-center">
                        @if ($article->author)
                            <div class="flex items-center">

                                <x-avatar :user="$article->author" class="w-6 h-6 rounded-full mr-3" />

                                <a href="{{ Panel::get($article->author)->url() }}" class="hover:underline">
                                    <span class="mr-5">{{ $article->author->name }}</span>
                                </a>
                            </div>
                        @endif

                        <div class="flex items-center">
                            <span class="font-mono text-sm mr-6 lg:mt-0">
                                {{ $article->created_at->format('j M, Y') }}
                            </span>

                            <span class="text-sm">
                                {{ $article->readTime() }} min read
                            </span>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div class="container mx-auto">
            <div class="flex px-4 lg:px-0 lg:mx-48">
                <div class="hidden lg:block lg:w-1/5">

                    <div class="py-12 mt-48 sticky top-0">
                        <x-articles.engage :article="$article" />
                    </div>

                </div>

                <div class="w-full pt-4 lg:w-4/5 lg:pt-10">
                    <x-articles.actions :article="$article" />




                    <div x-data="{}" x-init="function () { highlightCode($el); }"
                        class="prose prose-lg text-gray-800 prose-lio">
                        {!! $article->body() !!}
                    </div>

                    <div class="flex items-center gap-x-6 pt-6 pb-10">

                        <livewire:like-article :article="$article" :isSidebar="false" />

                        <div class="flex flex-col text-gray-900 text-xl font-semibold">
                            Like this article?
                            <span class="text-lg font-medium">
                                Let the author know and give them a clap!
                            </span>
                        </div>
                    </div>

                    @if ($article->author != null)
                        <div class="border-t-2 border-gray-200 py-8 lg:pt-14 lg:pb-16">
                            <div class="flex flex-col items-center justify-center gap-y-4 lg:flex-row lg:justify-between">
                                <div class="flex items-center gap-x-4">
                                    <x-avatar :user="$article->author" class="hidden w-16 h-16 lg:block" />

                                    <div
                                        class="flex flex-col items-center text-gray-900 text-xl font-semibold lg:items-start">
                                        {{ $article->author->username() }} ({{ $article->author->name() }})
                                        <span class="text-lg text-gray-700 font-medium">
                                            {{ $article->author->bio() }}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex items-center gap-x-6">
                                    @if ($article->author->githubUsername())
                                        <a href="https://github.com/{{ $article->author->githubUsername() }}">
                                            <x-svg icon="github" class="w-6 h-6" />
                                        </a>
                                    @endif

                                    @if ($article->author->hasTwitterAccount())
                                        <a href="https://twitter.com/{{ $article->author->twitter() }}"
                                            class="text-twitter">
                                            <x-svg icon="twitter" class="w-6 h-6" />
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </div>
        </div>

    </article>

    <section>
        <div class="container mx-auto py-6 px-4 lg:py-24 lg:px-0">
            <h2 class="text-4xl text-gray-900 font-bold">
                Other articles you might like
            </h2>

            <div class="flex flex-col gap-y-4 gap-x-6 mt-6 lg:flex-row lg:mt-12">
                @foreach ($_theme->trendingArticles($article) as $trendingArticle)
                    <x-articles.summary :article="$trendingArticle" is-featured />
                @endforeach
            </div>
        </div>
    </section>

    @can(\Modules\Blog\Models\Panels\Policies\ArticlePanelPolicy::APPROVE, $article)
        @if ($article->isAwaitingApproval())
            @include('pub_theme::_partials._update_modal', [
            'identifier' => 'approveArticle',
            'route' => ['admin.articles.approve', $article->slug()],
            'title' => "Approve article",
            'body' => '<p>Are you sure you want to approve this article?</p>',
            ])
        @endif
    @endcan

    @can(\Modules\Blog\Models\Panels\Policies\ArticlePanelPolicy::DISAPPROVE, $article)
        @if ($article->isPublished())
            @include('pub_theme::_partials._update_modal', [
            'identifier' => 'disapproveArticle',
            'route' => ['admin.articles.disapprove', $article->slug()],
            'title' => "Disapprove article",
            'body' => '<p>Are you sure you want to disapprove this article? Doing so will mean it is no longer live on the site.
            </p>',
            ])
        @endif
    @endcan

    @can(\Modules\Blog\Models\Panels\Policies\ArticlePanelPolicy::DELETE, $article)
        @include('pub_theme::_partials._delete_modal', [
        'identifier' => 'deleteArticle',
        'route' => ['articles.delete', $article->slug()],
        'title' => "Delete article",
        'body' => '<p>Are you sure you want to delete this article? Doing so will mean it is permanently removed from the site.
        </p>',
        ])
    @endcan

    @can(\Modules\Blog\Models\Panels\Policies\ArticlePanelPolicy::PINNED, $article)
        @include('pub_theme::_partials._update_modal', [
        'identifier' => 'togglePinnedStatus',
        'route' => ['admin.articles.pinned', $article->slug()],
        'title' => $article->isPinned() ? "Unpin article" : "Pin article",
        'body' => $article->isPinned() ? '<p>Are you sure you want to unpin this article?</p>' : '<p>Are you sure you want to
            pin this article?</p>',
        ])
    @endcan


@endsection
