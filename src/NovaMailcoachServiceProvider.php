<?php

namespace Kraenkvisuell\NovaMailcoach;

use Laravel\Nova\Nova;
use Livewire\Livewire;
use Manogi\Tiptap\Tiptap;
use Laravel\Nova\Fields\Text;
use Anaseqal\NovaImport\NovaImport;
use Illuminate\Support\Facades\Blade;
use Kraenkvisuell\NovaMailcoach\Nova\Campaign;
use OptimistDigital\NovaSettings\NovaSettings;
use Kraenkvisuell\NovaMailcoach\Nova\EmailList;
use Kraenkvisuell\NovaMailcoach\Nova\Subscriber;
use Spatie\Mailcoach\Models\Campaign as ModelsCampaign;
use Kraenkvisuell\NovaMailcoach\Policies\CampaignPolicy;
use Spatie\Mailcoach\Models\EmailList as ModelsEmailList;
use Kraenkvisuell\NovaMailcoach\Policies\SubscriberPolicy;
use Kraenkvisuell\NovaMailcoach\Observers\CampaignObserver;
use Spatie\Mailcoach\Models\Subscriber as ModelsSubscriber;
use Kraenkvisuell\NovaMailcoach\Observers\EmailListObserver;
use Kraenkvisuell\NovaMailcoach\Http\Livewire\SubscriptionForm;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class NovaMailcoachServiceProvider extends ServiceProvider
{
    protected $policies = [
        ModelsCampaign::class => CampaignPolicy::class,
        ModelsSubscriber::class => SubscriberPolicy::class,
    ];

    public function boot()
    {
        $this->loadJsonTranslationsFrom(__DIR__.'/../resources/lang');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-mailcoach');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/nova-mailcoach', 'nova-mailcoach'),
        ]);

        $this->publishes([
            __DIR__ . '/../config/nova-mailcoach.php' => config_path('nova-mailcoach.php'),
        ]);

        $this->loadRoutesFrom(base_path('vendor/spatie/laravel-mailcoach/routes/mailcoach-api.php'));

        Blade::component('nova-mailcoach::layout', 'layout');

        Livewire::component('subscription-form', SubscriptionForm::class);

        Nova::resources([
            Campaign::class,
            EmailList::class,
            Subscriber::class,
        ]);

        Nova::tools([
            new NovaImport,
            new NovaSettings,
        ]);

        Nova::serving(function () {
            ModelsCampaign::observe(CampaignObserver::class);
            ModelsEmailList::observe(EmailListObserver::class);
        });

        NovaSettings::addSettingsFields([
            Tiptap::make('Anmelde-Formular Introtext', 'subscription_intro_text'),
            Text::make('URL zur Datenschutzerklärung', 'privacy_url'),
        ]);

        $this->registerPolicies();
    }

    public function register()
    {
    }
}
