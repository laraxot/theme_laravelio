<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components;

use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class TagFilter extends Component {
    public $activeTag;
    public $tags;
    public $filter;
    public $route;
    public $cancelRoute;
    public $jumpTo;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($activeTag, $tags, $filter, $route, $cancelRoute, $jumpTo) {
        $this->activeTag = $activeTag;
        $this->tags = $tags;
        $this->filter = $filter;
        $this->route = $route;
        $this->cancelRoute = $cancelRoute;
        $this->jumpTo = $jumpTo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        return view()->make('pub_theme::components.tag-filter');
    }
}