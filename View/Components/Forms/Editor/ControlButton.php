<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components\Forms\Editor;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class ControlButton extends Component {
    public string $title;
    public string $icon;
    public string $control;
    //title="Heading" icon="heading" control

    public function __construct(string $title, string $icon, string $control) {
        $this->title = $title;
        $this->icon = $icon;
        $this->control = $control;
    }

    /**
     * Undocumented function.
     */
    public function render(): View {
        return view('pub_theme::components.forms.editor.control-button');
    }
}