<?php

declare(strict_types=1);

namespace Themes\LaravelIo\View\Components\Sponsor;

use Illuminate\View\Component;

/**
 * Undocumented class.
 */
class Logo extends Component {
    public string $url;
    public string $logo;
    public string $company;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $url, string $logo, string $company) {
        $this->url = $url;
        $this->logo = $logo;
        $this->company = $company;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render() {
        //return 'WIP['.__LINE__.']['.__FILE__.']';

        return view()->make('pub_theme::components.sponsor.logo');
    }
}

/*
 <x-sponsor.logo url="https://beyondco.de" logo="{{ Theme::asset('pub_theme::images/sponsors/beyondcode.png') }}" company="Beyond Code" />
 */
