<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components\Threads;

use Illuminate\View\Component;
use Modules\Forum\Models\Thread as ThreadModel;

/**
 * Undocumented class.
 */
class Thread extends Component {
    public ThreadModel $thread;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(ThreadModel $thread) {
        // dddx(get_class($thread));//Modules\Forum\Models\Thread
        $this->thread = $thread;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        $view = 'pub_theme::components.threads.thread';

        return view()->make($view);
    }
}
