<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components\Articles;

use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class TagFilter extends Component {
    public $selectedTag;
    public $tags;

    /**
     * Create a new component instance.
     *
     * @param mixed $selectedTag
     * @param mixed $tags
     *
     * @return void
     */
    public function __construct($selectedTag, $tags) {
        $this->selectedTag = $selectedTag;
        $this->tags = $tags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        return view()->make('pub_theme::components.articles.tag-filter');
    }
}
