<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components\Forms;

use BladeUIKit\Components\Forms\Label as Component;
use Illuminate\Contracts\View\View;

final class Label extends Component {
    public function render(): View {
        return view('pub_theme::components.forms.label');
    }
}
