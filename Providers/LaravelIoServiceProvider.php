<?php

declare(strict_types=1);

namespace Themes\LaravelIo\Providers;

use Illuminate\Support\Facades\Blade;
use Modules\Xot\Providers\XotBaseThemeServiceProvider;

class LaravelIoServiceProvider extends XotBaseThemeServiceProvider {
    public string $dir = __DIR__;
    public string $name = 'LaravelIo';
    public string $ns = 'pub_theme';

    public $blade_components = [
    ];

    public function bootCallback(): void {
        /*
        $blade_component_path = '\Themes\LaravelIo\View\Components';
        foreach ($this->blade_components as $name => $class) {
            Blade::component($name, $blade_component_path.'\\'.$class);
        }
        */
        $this->registerBladeDirective();
        $this->registerBladeComponents();
        $this->registerLivewireComponents();
    }
}
