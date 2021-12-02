<div class="flex flex-col gap-y-6">
    @forelse ($user->latestThreads() as $thread)
        <x-theme::threads.overview-summary :thread="$thread" />
    @empty
        <x-theme::empty-state title="{{ $user->username() }} has not posted any threads yet"
            icon="heroicon-o-document-text" />
    @endforelse
</div>
