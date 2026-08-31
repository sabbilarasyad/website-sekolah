<?php

namespace App\Providers;

use App\Hashing\CustomBcryptHasher;
use Illuminate\Hashing\HashManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->extend('hash', function (HashManager $hashManager) {
            $hashManager->extend('bcrypt', function () {
                return new CustomBcryptHasher([
                    'rounds' => config('hashing.bcrypt.rounds', 12),
                    'verify' => config('hashing.bcrypt.verify', true),
                    'limit' => config('hashing.bcrypt.limit'),
                ]);
            });

            return $hashManager;
        });
    }

    public function boot(): void
    {
        //
    }
}
