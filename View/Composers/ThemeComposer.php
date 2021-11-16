<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Composers;

use Illuminate\Support\Facades\Cache;
//use Themes\LaravelIo\Services\AdminLTE;
use Illuminate\View\View;
use Modules\Blog\Models\Article;
use Modules\Forum\Models\Reply;
use Modules\Forum\Models\Thread;
use Modules\LU\Models\User;
use Modules\Xot\Services\PanelService;

class ThemeComposer {
    /*
     * @var AdminLte
     */
    /*
    private $adminlte;


    public function __construct(AdminLTE $adminlte) {
        $this->adminlte = $adminlte;
    }
    */

    public string $model_name;
    public string $act;

    public function compose(View $view) {
        $view->with('_theme', $this);
    }

    /**
     * Undocumented function.
     */
    public function totalUsers(): int {
        $totalUsers = Cache::remember('totalUsers', now()->addDay(), function () {
            //return number_format(User::count());
            return User::count();
        });

        return (int) $totalUsers;
    }

    public function setModelName(string $model_name): self {
        $this->model_name = $model_name;

        return $this;
    }

    public function setAct(string $act) {
        $this->act = $act;

        return $this;
    }

    public function url(?string $model_name = null, ?string $act = null): string {
        if (null != $model_name) {
            $this->setModelName($model_name);
        }
        if (null != $act) {
            $this->setAct($act);
        }

        $model = xotModel($this->model_name);
        $panel = PanelService::get($model);
        $parz = [
            'act' => $this->act,
        ];

        return $panel->url($parz);
    }

    /**
     * Undocumented function.
     *
     * @return Collection
     */
    public function communityMembers() {
        $communityMembers = Cache::remember('communityMembers', now()->addMinutes(5), function () {
            return User::withCounts()
                ->hasActivity()
                ->whereNull('banned_at')
                ->inRandomOrder()
                ->take(100)
                ->get()
                ->chunk(20);
        });

        return $communityMembers;
    }

    public function totalThreads() {
        $totalThreads = Cache::remember('totalThreads', now()->addDay(), function () {
            return number_format(Thread::count());
        });

        return $totalThreads;
    }

    public function totalReplies() {
        $totalReplies = Cache::remember('totalReplies', now()->addDay(), function () {
            return number_format(Reply::count());
        });

        return $totalReplies;
    }

    public function latestThreads() {
        $latestThreads = Cache::remember('latestThreads', now()->addHour(), function () {
            return Thread::whereNull('solution_reply_id')
            ->whereBetween('threads.created_at', [now()->subMonth(), now()])
            ->inRandomOrder()
            ->limit(3)
            ->get();
        });

        return $latestThreads;
    }

    public function latestArticles() {
        $latestArticles = Cache::remember('latestArticles', now()->addHour(), function () {
            return Article::published()
            ->trending()
            ->limit(4)
            ->get();
        });

        return $latestArticles;
    }

    public function pinnedArticles() {
        $pinnedArticles = Article::published()
        ->pinned()
        ->latest('submitted_at')
        ->take(4)
        ->get();

        return $pinnedArticles;
    }

    public function moderators() {
        /*
        $moderators = Cache::remember('moderators', now()->addMinutes(30), function () {
            //return User::moderators()->get();
            return User::take('5')->get();
        });
        */

        $moderators = User::take('5')->get();

        return $moderators;
    }
}
