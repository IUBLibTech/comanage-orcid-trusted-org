<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
           $this->app->singleton('cas.username', function () {
            try {
                if (cas()->isAuthenticated()) {
                    return cas()->user();
                }
            } catch (\Exception $e) {
                // Log or silently fail
                return null;
            }
            return null;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $username = null;

    try {
        if (cas()->isAuthenticated()) {
            $username = cas()->user();
        }
    } catch (\Exception $e) {
        // Safe fallback: CAS hasn't initialized
        $username = null;
    }

    View::share('casUsername', $username);
    }
}
