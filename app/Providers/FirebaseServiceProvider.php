<?php

namespace App\Providers;

use Kreait\Firebase;
use Illuminate\Support\ServiceProvider;

class FirebaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Firebase::class, function() {
            return FirebaseFactory::fromServiceAccount(
                // Here the file is in the project root, but it could be anywhere
                base_path('google-service-account.json')
            );
        });

        $this->app->alias(Firebase::class, 'firebase');
    }
}
