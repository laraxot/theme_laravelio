<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components;

use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Moderators extends Component {
    public $moderators;

    /**
     * Create a new component instance.
     *
     * @param mixed $moderators
     *
     * @return void
     */
    public function __construct($moderators) {
        $this->moderators = $moderators;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        return view()->make('pub_theme::components.moderators');
    }
}
