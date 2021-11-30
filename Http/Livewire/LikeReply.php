<?php

namespace Themes\LaravelIo\Http\Livewire;

use Themes\LaravelIo\Jobs\LikeReply as LikeReplyJob;
use Themes\LaravelIo\Jobs\UnlikeReply as UnlikeReplyJob;
use Themes\LaravelIo\Models\Reply;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

final class LikeReply extends Component
{
    use DispatchesJobs;

    /** @var \App\Models\Reply */
    public $reply;

    public function mount(Reply $reply): void
    {
        $this->reply = $reply;
    }

    public function toggleLike(): void
    {
        if (Auth::guest()) {
            return;
        }

        if ($this->reply->isLikedBy(Auth::user())) {
            $this->dispatchNow(new UnlikeReplyJob($this->reply, Auth::user()));
        } else {
            $this->dispatchNow(new LikeReplyJob($this->reply, Auth::user()));
        }
    }
}
