<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components\Threads;

use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Thread extends Component {
    public $thread;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($thread) {
        dddx(get_class($thread));
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