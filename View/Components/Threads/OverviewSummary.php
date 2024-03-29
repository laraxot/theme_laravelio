<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components\Threads;

use Illuminate\View\Component;
use Modules\Forum\Models\Thread;

/**
 * Undocumented class.
 */
class OverviewSummary extends Component {
    public Thread $thread;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Thread $thread) {
        // dddx(get_class($thread)); //Modules\Forum\Models\Thread

        $this->thread = $thread;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        return view()->make('pub_theme::components.threads.overview-summary');
    }
}
