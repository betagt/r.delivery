<?php

namespace CodeDelivery\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\Dmitrovskiy\IonicPush\PushProcessor::class,function (){
            return new \Dmitrovskiy\IonicPush\PushProcessor(env('IONIC_PROFILE_ID'),env('IONIC_JWT_TOKEN'));
        });
        \PagSeguroLibrary::init();
        \PagSeguroConfig::init();
        \PagSeguroResources::init();
    }
}
