<?php

declare(strict_types=1);

namespace Codeat3\BladeIconpark;

use BladeUI\Icons\Factory;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\ServiceProvider;

final class BladeIconparkServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->registerConfig();

        $this->callAfterResolving(Factory::class, function (Factory $factory, Container $container) {
            $config = $container->make('config')->get('blade-iconpark', []);

            $factory->add('iconpark', array_merge(['path' => __DIR__ . '/../resources/svg'], $config));
        });
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/blade-iconpark.php', 'blade-iconpark');
    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/svg' => public_path('vendor/blade-iconpark'),
            ], 'blade-iconpark');

            $this->publishes([
                __DIR__ . '/../config/blade-iconpark.php' => $this->app->configPath('blade-iconpark.php'),
            ], 'blade-iconpark-config');
        }
    }
}
