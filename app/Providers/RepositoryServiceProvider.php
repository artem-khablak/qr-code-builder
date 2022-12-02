<?php

namespace App\Providers;

use App\Repository\QrCode\QrCodeRepository;
use App\Repository\QrCode\QrCodeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QrCodeRepositoryInterface::class, QrCodeRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
