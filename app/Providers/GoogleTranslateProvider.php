<?php

namespace App\Providers;

use App\Domain\GoogleTranslate\GoogleTranslateExtend;
use App\Domain\GoogleTranslate\GoogleTranslateService;
use Illuminate\Support\ServiceProvider;


class GoogleTranslateProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('Translate', function () {
            return new GoogleTranslateService
            (
                app()->make(GoogleTranslateExtend::class)
            );
        });
    }

}
