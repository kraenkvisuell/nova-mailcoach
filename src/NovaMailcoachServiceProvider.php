<?php

namespace Kraenkvisuell\NovaMailcoach;

use Laravel\Nova\Nova;
use Kraenkvisuell\NovaMailcoach\Policies\CampaignPolicy;
use Anaseqal\NovaImport\NovaImport;
use Illuminate\Support\Facades\Blade;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Kraenkvisuell\NovaMailcoach\Nova\Campaign;
use Kraenkvisuell\NovaMailcoach\Nova\EmailList;
use Kraenkvisuell\NovaMailcoach\Nova\Subscriber;
use Spatie\Mailcoach\Models\Campaign as ModelsCampaign;
use Kraenkvisuell\NovaMailcoach\Observers\CampaignObserver;

class NovaMailcoachServiceProvider extends ServiceProvider
{
    protected $policies = [
        ModelsCampaign::class => CampaignPolicy::class,
    ];

    public function boot()
    {
        $this->loadJsonTranslationsFrom(__DIR__.'/../resources/lang');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-mailcoach');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/nova-mailcoach', 'nova-mailcoach'),
        ]);

        $this->publishes([
            __DIR__ . '/../config/nova-mailcoach.php' => config_path('nova-mailcoach.php'),
        ], 'nova-mailcoach');

        $this->loadRoutesFrom(base_path('vendor/spatie/laravel-mailcoach/routes/mailcoach-api.php'));

        Blade::component('nova-mailcoach::layout', 'layout');

        Nova::resources([
            Campaign::class,
            EmailList::class,
            Subscriber::class,
        ]);

        Nova::tools([
            new NovaImport,
        ]);

        Nova::serving(function () {
            ModelsCampaign::observe(CampaignObserver::class);
        });

        $this->registerPolicies();
    }

    public function register()
    {
    }
}
