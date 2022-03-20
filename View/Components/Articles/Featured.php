<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components\Articles;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Featured extends Component {
    public Collection $articles;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Collection $articles) {
        $this->articles = $articles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        return view()->make('pub_theme::components.articles.featured');
    }
}
