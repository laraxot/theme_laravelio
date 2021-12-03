<?php

declare(strict_types=1);

namespace Themes\LaravelIo\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LaravelIoServiceProvider {
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

    public function registerBladeDirective() {
        Blade::directive('md', function ($expression) {
            return '<'."?php echo md_to_html($expression); ?".'>';
        });

        Blade::directive('error', function ($expression) {
            return '<'."?php echo \$errors->first($expression, '<span class=\"block text-sm text-red-500 mt-2\">:message</span>'); ?".'>';
        });

        Blade::directive('formGroup', function ($expression) {
            return '<div class="form-group<'."?php echo \$errors->has($expression) ? ' has-error' : '' ?".'>">';
        });

        Blade::directive('endFormGroup', function ($expression) {
            return '</div>';
        });

        Blade::directive('title', function ($expression) {
            return '<'."?php \$title = $expression ?".'>';
        });

        Blade::directive('shareImage', function ($expression) {
            return '<'."?php \$shareImage = $expression ?".'>';
        });

        Blade::directive('canonical', function ($expression) {
            return '<'."?php \$canonical = $expression ?".'>';
        });
    }

    public function registerBladeComponents(): void {
        $components_json = $this->dir.'/../View/Components/_components.json';
        $exists = File::exists($components_json);
        if ($exists && false) {
            $content = File::get($components_json);
            $comps = json_decode($content);
        } else {
            $files = File::allFiles(dirname($components_json));

            $comps = [];
            foreach ($files as $k => $v) {
                if ('php' == $v->getExtension()) {
                    $tmp = (object) [];
                    $class_name = $v->getFilenameWithoutExtension();

                    $tmp->class_name = $class_name;

                    //$tmp->comp_name = $this->ns.'::'.Str::snake(Str::replace('\\', ' ', $class_name));
                    $tmp->comp_name = Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)));

                    $tmp->comp_ns = 'Themes\\'.$this->name.'\View\Components\\'.$class_name;

                    if ('' != $v->getRelativePath()) {
                        //$tmp->comp_name = $this->module_name.'::';
                        $tmp->comp_name = '';
                        $piece = collect(explode('\\', $v->getRelativePath()))->map(function ($item) {
                            return Str::slug(Str::snake($item));
                        })->implode('.');
                        $tmp->comp_name .= $piece;
                        $tmp->comp_name .= '.'.Str::snake(Str::replace('\\', ' ', $class_name));
                        $tmp->comp_ns = 'Themes\\'.$this->name.'\View\Components\\'.$v->getRelativePath().'\\'.$class_name;
                        $tmp->class_name = $v->getRelativePath().'\\'.$tmp->class_name;
                    }

                    $comps[] = $tmp;
                }
            }

            $content = json_encode($comps);
            if (false === $content) {
                throw new \Exception('can not decode json');
            }
            $old_content = '';
            if (File::exists($components_json)) {
                $old_content = File::get($components_json);
            }
            if ($old_content != $content) {
                File::put($components_json, $content);
            }
        }

        foreach ($comps as $comp) {
            Blade::component($comp->comp_name, $comp->comp_ns);
        }
    }

    public function registerLivewireComponents(): void {
        $components_json = $this->dir.'/../Http/Livewire/_components.json';
        //$force_recreate = request()->input('force_recreate', true);
        $exists = File::exists($components_json);
        if ($exists) {
            $content = File::get($components_json);
            $comps = json_decode($content);
        } else {
            $files = File::allFiles(dirname($components_json));

            $comps = [];
            foreach ($files as $k => $v) {
                if ('php' == $v->getExtension()) {
                    $tmp = (object) [];
                    $class_name = $v->getFilenameWithoutExtension();

                    $tmp->class_name = $class_name;

                    //$tmp->comp_name = $this->ns.'::'.Str::snake(Str::replace('\\', ' ', $class_name));
                    $tmp->comp_name = Str::slug(Str::snake(Str::replace('\\', ' ', $class_name)));

                    $tmp->comp_ns = 'Themes\\'.$this->name.'\Http\Livewire\\'.$class_name;

                    if ('' != $v->getRelativePath()) {
                        //$tmp->comp_name = $this->module_name.'::';
                        $tmp->comp_name = '';
                        $piece = collect(explode('\\', $v->getRelativePath()))->map(function ($item) {
                            return Str::snake($item);
                        })->implode('.');
                        $tmp->comp_name .= $piece;
                        $tmp->comp_name .= '.'.Str::snake(Str::replace('\\', ' ', $class_name));
                        $tmp->comp_name = Str::slug($tmp->comp_name);
                        $tmp->comp_ns = 'Themes\\'.$this->name.'\Http\Livewire\\'.$v->getRelativePath().'\\'.$class_name;
                        $tmp->class_name = $v->getRelativePath().'\\'.$tmp->class_name;
                    }

                    $comps[] = $tmp;
                }
            }

            $content = json_encode($comps);
            if (false === $content) {
                throw new \Exception('can not decode json');
            }
            $old_content = '';
            if (File::exists($components_json)) {
                $old_content = File::get($components_json);
            }
            if ($old_content != $content) {
                File::put($components_json, $content);
            }
        }
        //dddx($comps);

        if (class_exists("Livewire\Livewire")) {
            foreach ($comps as $comp) {
                \Livewire\Livewire::component($comp->comp_name, $comp->comp_ns);
            }
        }
    }
}
