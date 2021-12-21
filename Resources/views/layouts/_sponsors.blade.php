<div class="container mx-auto flex justify-center mt-14">
    <div class="w-full mx-4 text-center">
        <p class="text-base mb-6 md:text-lg md:mb-12">
            We'd like to thank these <x-accent-text>amazing companies</x-accent-text> for supporting us
        </p>

        <div class="mt-6 grid grid-cols-2 gap-y-8 lg:grid-cols-4">
            <div class="col-span-2 flex justify-center lg:col-span-1">
                <x-sponsor.logo url="https://beyondco.de" logo="{{ Theme::asset('pub_theme::images/sponsors/beyondcode.png') }}"
                    company="Beyond Code" />
            </div>

            <div class="col-span-2 flex justify-center lg:col-span-1">
                <x-sponsor.logo url="https://devsquad.com" logo="{{ Theme::asset('pub_theme::images/sponsors/devsquad.png') }}"
                    company="DevSquad" />
            </div>

            <div class="col-span-2 flex justify-center lg:col-span-1">
                <x-sponsor.logo url="https://usefathom.com/ref/7A8QGC"
                    logo="{{ Theme::asset('pub_theme::images/sponsors/fathom.png') }}" company="Fathom" />
            </div>

            <div class="col-span-2 flex justify-center lg:col-span-1">
                <x-sponsor.logo url="https://forge.laravel.com/" logo="{{ Theme::asset('pub_theme::images/sponsors/forge.png') }}"
                    company="Forge" />
            </div>

            <div class="col-span-2 flex justify-center lg:col-span-1">
                <x-sponsor.logo url="https://envoyer.io/" logo="{{ Theme::asset('pub_theme::images/sponsors/envoyer.png') }}"
                    company="Envoyer" />
            </div>

            <div class="col-span-2 flex justify-center lg:col-span-1">
                <x-sponsor.logo url="https://blackfire.io/" logo="{{ Theme::asset('pub_theme::images/sponsors/blackfire-io.png') }}"
                    company="Blackfire.io" />
            </div>

            <div class="col-span-2 flex justify-center lg:col-span-1">
                <x-sponsor.logo
                    url="https://akaunting.com/developers?utm_source=Laravelio&utm_medium=Banner&utm_campaign=Developers"
                    logo="{{ Theme::asset('pub_theme::images/sponsors/akaunting.png') }}" company="Akaunting" />
            </div>

            <div class="col-span-2 flex justify-center lg:col-span-1">
                <x-sponsor.logo url="https://larajobs.com" logo="{{ Theme::asset('pub_theme::images/sponsors/larajobs.svg') }}"
                    company="LaraJobs" />
            </div>

            <div class="col-span-2 flex justify-center lg:col-span-1">
                <x-sponsor.logo url="https://ter.li/vj4bxb" logo="{{ Theme::asset('pub_theme::images/sponsors/scout-apm.jpg') }}"
                    company="Scout APM" />
            </div>

            <div class="col-span-2 flex justify-center lg:col-span-1">
                <x-sponsor.logo url="https://www.cloudways.com/en/?id=972670"
                    logo="{{ Theme::asset('pub_theme::images/sponsors/cloudways.png') }}" company="Cloudways" />
            </div>

            <div class="col-span-2 flex justify-center lg:col-span-1">
                <x-sponsor.logo url="https://red-amber.green"
                    logo="{{ Theme::asset('pub_theme::images/sponsors/red-amber.green.svg') }}" company="red-amber.green" />
            </div>
        </div>

        <x-ads.cta primary class="mt-8 md:mt-12">
            Your logo here?
        </x-ads.cta>
    </div>
</div>
