<div class="flex flex-col gap-y-6">
    @forelse ($user->latestReplies(5) as $reply)
        <x-theme::users.reply :thread="$reply->replyAble()" :reply="$reply" />
    @empty
        <x-theme::empty-state title="{{ $user->username() }} has not posted any replies yet"
            icon="heroicon-o-annotation" />
    @endforelse
</div>
