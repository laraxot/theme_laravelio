@props(['thread'])

<div class="bg-white shadow rounded-md">
    <div class="flex flex-col p-5">
        <h3 class="text-xl font-semibold">Notifications</h3>

        @can(App\Policies\ThreadPolicy::UNSUBSCRIBE, $thread)
            <x-button.secondary-cta href="{{ route('threads.unsubscribe', $thread->slug()) }}" class="w-full mt-3">
                <span class="flex items-center justify-center gap-x-2">
                    <x-svg icon="o-volume-off" class="w-6 h-6" />
                    Unsubscribe
                </span>
            </x-button.secondary-cta>

            <p class="text-gray-600 mt-4">
                You are currently receiving notifications of updates from this thread.
            </p>
        @elsecan(App\Policies\ThreadPolicy::SUBSCRIBE, $thread)
            <x-button.secondary-cta href="{{ route('threads.subscribe', $thread->slug()) }}" class="w-full mt-3">
                <span class="flex items-center justify-center gap-x-2">
                    <x-svg icon="o-volume-up" class="w-6 h-6" />
                    Subscribe
                </span>
            </x-button.secondary-cta>

            <p class="text-gray-600 mt-4">
                You are not currently receiving notifications of updates from this thread.
            </p>
        @endcan
    </div>
</div>
