<?php

namespace Kraenkvisuell\NovaMailcoach;

use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Kraenkvisuell\NovaMailcoach\Console\Init;
use Kraenkvisuell\NovaMailcoach\Console\RemoveExampleViews;
use Kraenkvisuell\NovaMailcoach\Console\PublishExampleViews;

class NovaMailcoachServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }

    public function register()
    {
    }
}
