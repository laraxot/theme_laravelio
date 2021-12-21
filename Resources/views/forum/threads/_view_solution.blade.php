@if ($thread->isSolved())
    <a class="label label-primary text-center mt-4 sm:mt-0"
       href="{{ Panel::get($thread)->url() }}#{{ $thread->solution_reply_id }}">
        <x-svg icon="s-check" class="inline w-4 h-4" />
        View solution
    </a>
@endif

