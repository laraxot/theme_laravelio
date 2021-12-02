<div class="thread-info-avatar">
    <a href="{{ route('profile', $user->username()) }}">
        <x-theme::avatar :user="$user" class="img-circle mr-3" width="{{ $size ?? 25 }}" />
    </a>
</div>
