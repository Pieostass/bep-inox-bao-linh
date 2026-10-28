<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
     public function boot(): void
     {
         \Illuminate\Support\Facades\Schema::defaultStringLength(191);

         // Catch N+1 queries during development only
         \Illuminate\Database\Eloquent\Model::preventLazyLoading(! $this->app->isProduction());

         if (
             $this->app->isProduction() ||
             (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
             (isset($_SERVER['HTTP_HOST']) && (
                 str_contains($_SERVER['HTTP_HOST'], 'serveo') ||
                 str_contains($_SERVER['HTTP_HOST'], 'trycloudflare') ||
                 str_contains($_SERVER['HTTP_HOST'], 'loca.lt')
             ))
         ) {
             \Illuminate\Support\Facades\URL::forceScheme('https');
         }
     }
}
