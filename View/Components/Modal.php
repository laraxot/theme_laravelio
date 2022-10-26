<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components;

use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Modal extends Component {
    public $identifier;

    public $title;

    public $action;

    public $type;

    public $submitLabel;

    public function __construct(string $identifier, string $title, string $action, string $type = 'delete', string $submitLabel = null) {
        $this->identifier = $identifier;
        $this->title = $title;
        $this->action = $action;
        $this->type = $type;
        $this->submitLabel = $submitLabel ?: $this->title;
    }

    public function render() {
        return view('pub_theme::components.modal');
    }

    public function method() {
        switch ($this->type) {
            case 'delete':
                return 'delete';
            case 'update':
                return 'put';
            default:
                return 'post';
        }
    }
}
