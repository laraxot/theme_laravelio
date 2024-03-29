<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components\Threads;

use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Reply extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        $view = 'pub_theme::components.threads.reply';

        return view()->make($view);
    }
}
