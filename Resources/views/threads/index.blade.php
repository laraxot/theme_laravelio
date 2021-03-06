@php($subTitle = isset($activeTag) ? $activeTag->name() : null)
{{-- @title('Forum' . (isset($subTitle) ? ' > ' . $subTitle : '')) --}}
@php($threads = $rows)
@php($filter = null)
@extends('pub_theme::layouts.default', ['hasShadow' => true, 'isTailwindUi' => true])
@section('content')
    <div class="pt-5 pb-10 lg:pt-10 lg:pb-0">
        <div class="container mx-auto flex flex-col gap-x-12 px-4 lg:flex-row">
            <div class="lg:w-3/4">
                <div class="flex justify-between items-center lg:block">
                    <div class="flex justify-between items-center">
                        <h1 class="text-4xl text-gray-900 font-bold">
                            Forum
                        </h1>
                        <x-button.primary-button
                            href="{{-- $_panel->url(['act'=>'create']) --}}{{ route('containers.show', ['container0' => 'pages', 'item0' => 'thread-create']) }}"
                            class="hidden lg:block">
                            Create Thread
                        </x-button.primary-button>
                    </div>

                    <div class="flex items-center justify-between lg:mt-6">
                        <h3 class="text-gray-800 text-xl font-semibold">
                            {{ number_format($threads->total()) }} Threads
                        </h3>

                        <div class="hidden lg:flex gap-x-2">
                            <x-threads.filter :filter="$filter" />

                            <div class="flex-shrink-0">
                                <x-button.secondary-button class="flex items-center gap-x-2"
                                    @click="activeModal = 'tag-filter'">
                                    <x-svg icon="o-filter" class="w-5 h-5" />
                                    Tag filter
                                </x-button.secondary-button>
                            </div>
                        </div>
                    </div>

                    @isset($activeTag)
                        <div class="hidden lg:flex gap-x-4 items-center mt-4 pt-5 border-t">
                            Filter applied
                            <x-tag>
                                <span class="flex items-center gap-x-1">
                                    {{ $activeTag->name() }}
                                    <a href="{{ route('forum') }}">
                                        <x-svg icon="o-x" class="w-5 h-5" />
                                    </a>
                                </span>
                            </x-tag>
                        </div>
                    @endisset
                </div>

                <div class="pt-2 lg:hidden">
                    @include('pub_theme::layouts._ads._forum_sidebar')

                    <div class="flex justify-center mt-6">
                        <x-button.dark-cta>
                            <x-svg icon="s-rss" class="w-6 h-6 mr-2" />
                            RSS Feed
                        </x-button.dark-cta>
                    </div>

                    <div class="flex gap-x-4 mt-10">
                        <div class="w-1/2">
                            <x-button.secondary-cta class="w-full" @click="activeModal = 'tag-filter'">
                                <span class="flex items-center gap-x-2">
                                    <x-svg icon="o-filter" class="w-5 h-5" />
                                    Tag filter
                                </span>
                            </x-button.secondary-cta>
                        </div>

                        <div class="w-1/2">
                            <x-button.primary-cta href="{{-- route('threads.create') --}}" class="w-full">
                                Create Thread
                            </x-button.primary-cta>
                        </div>
                    </div>

                    <div class="flex mt-4">
                        <x-threads.filter :filter="$filter" />
                    </div>

                    @isset($activeTag)
                        <div class="flex gap-x-4 items-center mt-4">
                            Filter applied
                            <x-tag>
                                <span class="flex items-center gap-x-1">
                                    {{ $activeTag->name() }}
                                    <a href="{{ route('forum') }}">
                                        <x-svg icon="o-x" class="w-5 h-5" />
                                    </a>
                                </span>
                            </x-tag>
                        </div>
                    @endisset
                </div>

                <section class="mt-8 mb-5 lg:mb-32">
                    <div class="flex flex-col gap-y-4">
                        @foreach ($threads as $thread)
                            <x-threads.overview-summary :thread="$thread" />
                        @endforeach
                    </div>

                    <div class="mt-10">
                        {{ $threads->onEachSide(1)->links() }}
                    </div>
                </section>
            </div>

            <div class="lg:w-1/4">
                <div class="hidden lg:block">
                    @include('pub_theme::layouts._ads._forum_sidebar')
                </div>

                <div class="bg-white shadow rounded-md mt-6">
                    <h3 class="text-xl font-semibold px-5 pt-5">
                        Thanks to our community
                    </h3>

                    <ul>
                        {{-- @foreach ($topMembers as $member)
                            <li class="{{ !$loop->last ? 'border-b ' : '' }}pb-3 pt-5">
                                <div class="flex justify-between items-center px-5">
                                    <div class="flex items-center gap-x-5">
                                        <a href="{{ route('profile', $member->username()) }}">
                                            <x-avatar :user="$member" class="w-10 h-10" />
                                        </a>

                                        <span class="flex flex-col">
                                            <a href="{{ route('profile', $member->username()) }}" class="hover:underline">
                                                <span class="text-gray-900 font-medium">
                                                    {{ $member->username() }}
                                                </span>
                                            </a>

                                            <span class="text-gray-700">
                                                {{ $member->solutions_count }}
                                                {{ Str::plural('Solution', $member->solutions_count) }}
                                            </span>
                                        </span>
                                    </div>

                                    <div>
                                        <span class="flex items-center gap-x-3 text-lio-500">
                                            <span class="text-xl font-medium">
                                                {{ $loop->iteration }}
                                            </span>
                                             <x-svg icon="trophy" class="w-6 h-6" />
                                        </span>
                                    </div>
                                </div>
                            </li>
                        @endforeach --}}
                    </ul>

                    <p class="px-5 pt-3 pb-5 text-center text-xs text-gray-700">
                        Solutions given in the past year.
                    </p>
                </div>
                {{-- <div class="mt-6">
                    <x-moderators :moderators="$moderators" />
                </div> --}}

                <div class="hidden lg:block mt-6">
                    <x-button.dark-cta class="w-full">
                        <x-svg icon="s-rss" class="w-6 h-6 mr-2" />
                        RSS Feed
                    </x-button.dark-cta>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" x-show="activeModal === 'tag-filter'" x-cloak>
        <div class="w-full h-full p-8 lg:w-96 lg:h-3/4 overflow-y-scroll">
            {{-- <x-tag-filter :activeTag="$activeTag ?? null" :tags="$tags" :filter="$filter" /> --}}
        </div>
    </div>
@endsection
