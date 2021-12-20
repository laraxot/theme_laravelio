<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components\Articles;

use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Filter extends Component {
    public $selectedSortBy;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($selectedSortBy) {
        $this->selectedSortBy = $selectedSortBy;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        return view()->make('pub_theme::components.articles.filter');
    }
}
