<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components\Ads;

use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Cta extends Component {
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
        return view()->make('pub_theme::components.ads.cta');
    }
}