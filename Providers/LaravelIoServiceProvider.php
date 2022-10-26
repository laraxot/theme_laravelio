<?php

/**
 * ---.
 */
declare(strict_types=1);

namespace Themes\LaravelIo\Providers;

use Modules\Xot\Providers\XotBaseThemeServiceProvider;

class LaravelIoServiceProvider extends XotBaseThemeServiceProvider {
    public string $dir = __DIR__;
    public string $name = 'LaravelIo';
    public string $ns = 'pub_theme';
}
