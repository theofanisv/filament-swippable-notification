<?php

namespace Sanzgrapher\SwippableNotification;

use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\ServiceProvider;

class SwippableNotificationServiceProvider extends ServiceProvider
{
    public const PACKAGE = 'sanzgrapher/swippable-notification';

    public function boot(): void
    {
        // Registered here, from the package's own files, so that `php artisan filament:assets` publishes them like
        // any other Filament plugin's and an update of the package reaches the public folder by itself. They are
        // loaded on request only; the plugin switches them on for the panels it is added to.
        FilamentAsset::register([
            Css::make('swippable-notification-styles', __DIR__.'/../resources/dist/swippable-notification.css')->loadedOnRequest(),
            Js::make('init-swippable', __DIR__.'/../resources/dist/init-swippable.js')->loadedOnRequest(),
        ], self::PACKAGE);

        // Kept for installs that published the files by hand: same files, same places.
        $this->publishes([
            __DIR__.'/../resources/dist/init-swippable.js' => public_path('js/sanzgrapher/swippable-notification/init-swippable.js'),
            __DIR__.'/../resources/dist/swippable-notification.css' => public_path('css/sanzgrapher/swippable-notification/swippable-notification-styles.css'),
        ], 'swippable-notification-assets');
    }
}
