<?php

namespace App\Support\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;


class DomainServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerMigrations();
    }

    public function registerMigrations(): void
    {
        $directories = File::glob(app_path('Domain/*/Database/Migrations/*.php'));
        $this->loadMigrationsFrom($directories);
    }
}
