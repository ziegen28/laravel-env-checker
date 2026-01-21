<?php

namespace EnvChecker;

use Illuminate\Support\ServiceProvider;

class EnvCheckerServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        if (!class_exists(\EnvChecker\Commands\EnvCheckCommand::class)) {
            return;
        }

        $this->commands([
            \EnvChecker\Commands\EnvCheckCommand::class,
        ]);
    }
}
