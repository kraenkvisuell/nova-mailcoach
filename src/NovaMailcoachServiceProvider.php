<?php

namespace Kraenkvisuell\NovaMailcoach;

use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Kraenkvisuell\NovaMailcoach\Nova\Campaign;
use Kraenkvisuell\NovaMailcoach\Nova\EmailList;
use Spatie\Mailcoach\Models\Campaign as ModelsCampaign;
use Kraenkvisuell\NovaMailcoach\Observers\CampaignObserver;

class NovaMailcoachServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadJsonTranslationsFrom(__DIR__.'/../resources/lang');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-mailcoach');

        $this->loadRoutesFrom(__DIR__.'/../vendor/spatie/laravel-mailcoach/routes/mailcoach-api.php');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/nova-mailcoach', 'nova-mailcoach'),
        ]);

        $this->publishes([
            __DIR__ . '/../config/nova-mailcoach.php' => config_path('nova-mailcoach.php'),
        ], 'nova-mailcoach');

        Blade::component('nova-mailcoach::layout', 'layout');

        Nova::resources([
            Campaign::class,
            EmailList::class,
        ]);

        Nova::serving(function () {
            ModelsCampaign::observe(CampaignObserver::class);
        });
    }

    public function register()
    {
    }
}
