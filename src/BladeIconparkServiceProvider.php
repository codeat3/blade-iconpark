<?php

declare(strict_types=1);

namespace Codeat3\BladeIconpark;

use BladeUI\Icons\Factory;
use Illuminate\Support\ServiceProvider;

final class BladeIconparkServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->callAfterResolving(Factory::class, function (Factory $factory) {
            $factory->add('iconpark', [
                'path' => __DIR__.'/../resources/svg',
                'prefix' => 'iconpark',
            ]);
        });
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../resources/svg' => public_path('vendor/blade-iconpark'),
            ], 'blade-iconpark');
        }
    }
}
