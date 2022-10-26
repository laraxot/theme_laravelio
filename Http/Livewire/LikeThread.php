<?php

declare(strict_types=1);

namespace Themes\LaravelIo\Http\Livewire;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Themes\LaravelIo\Jobs\LikeThread as LikeThreadJob;
use Themes\LaravelIo\Jobs\UnlikeThread as UnlikeThreadJob;
use Themes\LaravelIo\Models\Thread;

final class LikeThread extends Component {
    use DispatchesJobs;

    /** @var \App\Models\Thread */
    public $thread;

    public function mount(Thread $thread): void {
        $this->thread = $thread;
    }

    public function toggleLike(): void {
        if (Auth::guest()) {
            return;
        }

        if ($this->thread->isLikedBy(Auth::user())) {
            $this->dispatchNow(new UnlikeThreadJob($this->thread, Auth::user()));
        } else {
            $this->dispatchNow(new LikeThreadJob($this->thread, Auth::user()));
        }
    }
}
