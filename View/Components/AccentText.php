<?php
/**
 * Target [Modules\Xot\Contracts\UserContract] is not instantiable while building.
 */

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components;

use Illuminate\View\Component;
use Modules\LU\Models\User;

/**
 * Undocumented class.
 */
class AccentText extends Component {
    //public ?User $user;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    //public function __construct(?User $user) {
    //    $this->user = $user;
    //}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        return view()->make('pub_theme::components.accent-text');
    }
}
