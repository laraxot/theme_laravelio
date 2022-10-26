<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components\Articles;

use Illuminate\View\Component;
use Modules\Blog\Models\Article;

/**
 * Undocumented class.
 */
class Actions extends Component {
    public Article $article;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Article $article) {
        $this->article = $article;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        return view()->make('pub_theme::components.articles.actions');
    }
}
