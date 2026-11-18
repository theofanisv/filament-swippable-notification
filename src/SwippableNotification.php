<?php

namespace Sanzgrapher\SwippableNotification;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Facades\FilamentAsset;

class SwippableNotification implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function register(Panel $panel): void
    {
        // Registration logic
    }

    public function boot(Panel $panel): void
    {
        // The service provider registers the stylesheet and the script as loaded on request. A panel that has this
        // plugin loads them on every page.
        $package = [SwippableNotificationServiceProvider::PACKAGE];

        foreach ([...FilamentAsset::getStyles($package), ...FilamentAsset::getScripts($package)] as $asset) {
            $asset->loadedOnRequest(false);
        }
    }

    public function getId(): string
    {
        return 'swippable-notification';
    }
}
