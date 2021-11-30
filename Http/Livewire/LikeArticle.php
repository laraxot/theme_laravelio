<?php

namespace Themes\LaravelIo\Http\Livewire;

use Themes\LaravelIo\Jobs\LikeArticle as LikeArticleJob;
use Themes\LaravelIo\Jobs\UnlikeArticle as UnlikeArticleJob;
use Themes\LaravelIo\Models\Article;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

final class LikeArticle extends Component
{
    use DispatchesJobs;

    public $article;

    public $isSidebar = true;

    protected $listeners = ['likeToggled'];

    public function mount(Article $article): void
    {
        $this->article = $article;
    }

    public function toggleLike(): void
    {
        if (Auth::guest()) {
            return;
        }

        if ($this->article->isLikedBy(Auth::user())) {
            $this->dispatchNow(new UnlikeArticleJob($this->article, Auth::user()));
        } else {
            $this->dispatchNow(new LikeArticleJob($this->article, Auth::user()));
        }

        $this->emit('likeToggled');
    }

    public function likeToggled()
    {
        return $this->article;
    }
}
