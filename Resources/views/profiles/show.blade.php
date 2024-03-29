@php($user = $row)


@extends('pub_theme::layouts.default')

@section('content')
    <section class="bg-white">
        <div class="bg-gray-900 bg-contain h-60 w-full"
            style="background-image: url('{{ Theme::asset('pub_theme::images/profile-background.svg') }}')"></div>

        <div class="container mx-auto">
            <div class="flex justify-center lg:justify-start">
                <x-avatar :user="$user" class="-mt-24 w-48 h-48 rounded-full border-8 border-white" />
            </div>

            <div class="flex flex-col mt-5 p-4 lg:flex-row lg:gap-x-12">
                <div class="w-full mb-10 lg:w-1/3 lg:mb-0">
                    <div>
                        <div class="flex items-center gap-x-4">
                            <h1 class="text-4xl font-bold">{{ $user->name }}</h1>
                            {{-- @if ($user->isAdmin() || $user->isModerator())
                                <span class="border border-lio-500 text-lio-500 rounded px-3 py-1">
                                    {{ $user->isAdmin() ? 'Admin' : 'Moderator' }}
                                </span>
                            @endif --}}
                        </div>

                        <span class="text-gray-600">
                            Joined {{ $user->created_at->format('j M Y') }}
                        </span>
                    </div>

                    <div class="mt-4">
                        <span class="text-gray-900">
                            {{ $user->bio }}
                        </span>
                    </div>
                    {{-- <div class="mt-4 mb-6 flex items-center gap-x-3">
                        @if ($user->githubUsername())
                            <a href="https://github.com/{{ $user->githubUsername() }}">
                                <x-svg icon="github" class="w-6 h-6" />
                            </a>
                        @endif

                        @if ($user->hasTwitterAccount())
                            <a href="https://twitter.com/{{ $user->twitter() }}" class="text-twitter">
                                <x-svg icon="twitter" class="w-6 h-6" />
                            </a>
                        @endif
                    </div> --}}

                    <div class="flex flex-col gap-y-4">
                        @if ($user->isLoggedInUser())
                            <x-button.secondary-button href="{{ route('settings.profile') }}"
                                class="w-full">
                                <span class="flex items-center gap-x-2">
                                    <x-svg icon="o-pencil" class="w-5 h-5" />
                                    Edit profile
                                </span>
                                </x-button.secondary-button>
                        @endif
                        {{-- @can(App\Policies\UserPolicy::BAN, $user) --}}
                        @if ($user->isBanned())
                            <x-button.secondary-button class="w-full"
                                @click.prevent="activeModal = 'unbanUser'">
                                <span class="flex items-center gap-x-2">
                                    <x-svg icon="o-check" class="w-5 h-5" />
                                    Unban User
                                </span>
                                </x-button.secondary-button>
                            @else
                                <x-button type="danger" class="w-full"
                                    @click.prevent="activeModal = 'banUser'">
                                    <span class="flex items-center gap-x-2">
                                        <x-svg icon="hammer" class="w-5 h-5" />
                                        Ban User
                                    </span>
                                </x-button>
                        @endif
                        {{-- @endcan --}}
                        {{-- @if (Auth::check() && Auth::user()->isAdmin())
                            @can(App\Policies\UserPolicy::DELETE, $user)
                                <x-button.danger-button class="w-full"
                                    @click.prevent="activeModal = 'deleteUser'">
                                    <span class="flex items-center gap-x-2">
                                        <x-svg icon="o-trash" class="w-5 h-5" />
                                        Delete User
                                    </span>
                                    </x-button.danger-button>
                                @endcan
                        @endif --}}
                    </div>
                </div>

                <div class="w-full lg:w-2/3">
                    <h2 class="text-3xl font-semibold">
                        Statistics
                    </h2>

                    <div class="mt-4 grid grid-cols-1 lg:grid-cols-2">
                        <div class="w-full flex justify-between px-5 py-2.5 bg-gray-100">
                            <span>Threads</span>
                            <span class="text-lio-500">

                                {{ number_format($user->countThreads()) }}

                            </span>
                        </div>

                        <div class="w-full flex justify-between px-5 py-2.5 bg-white lg:bg-gray-100">
                            <span>Replies</span>
                            <span class="text-lio-500">

                                {{ number_format($user->countReplies()) }}

                            </span>
                        </div>

                        <div class="w-full flex justify-between px-5 py-2.5 bg-gray-100 lg:bg-white">
                            <span>Solutions</span>
                            <span class="text-lio-500">
                                {{ number_format($user->countSolutions()) }}
                            </span>
                        </div>

                        <div class="w-full flex justify-between px-5 py-2.5">
                            <span>Articles</span>
                            <span class="text-lio-500">
                                {{ number_format($user->countArticles()) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            @php($articles = $user->latestArticles(3))
            @if ($articles->count() > 0)
                <div class="mt-10 px-4 lg:mt-28">
                    <h2 class="text-3xl font-semibold">
                        Articles
                    </h2>

                    <div class="mt-8 flex flex-col gap-y-8 lg:flex-row lg:gap-x-8 lg:mb-16">
                        @foreach ($articles as $article)
                            <div class="w-full lg:w-1/3">
                                <x-articles.user-summary :article="$article" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        <div class="mt-16 lg:mt-32" x-data="{ tab: 'threads' }">
            <div class="container mx-auto">
                <nav class="flex items-center justify-between lg:justify-start">
                    <button @click="tab = 'threads'"
                        :class="{ 'text-lio-500 border-lio-500 border-b-2': tab === 'threads' }"
                        class="px-4 whitespace-nowrap py-5 font-medium text-lg text-gray-900 hover:text-lio-500 hover:border-lio-500 focus:outline-none focus:text-lio-500 focus:border-lio-500 lg:w-1/3">
                        Threads posted
                    </button>
                    <button @click="tab = 'replies'"
                        :class="{ 'text-lio-500 border-lio-500 border-b-2': tab === 'replies' }"
                        class="px-4 whitespace-nowrap py-5 font-medium text-lg text-gray-900 hover:text-lio-500 hover:border-lio-500 focus:outline-none focus:text-lio-500 focus:border-lio-500 lg:w-1/3">
                        Replies posted
                    </button>
                </nav>
            </div>

            <div class="bg-gray-100 py-14 px-4">
                <div class="container mx-auto">
                    <div x-show="tab === 'threads'">
                        {{--
                        @include('pub_theme::users._latest_threads')
                        --}}
                    </div>

                    <div x-show="tab === 'replies'" x-cloak>
                        {{--
                        @include('pub_theme::users._latest_replies')
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </section>