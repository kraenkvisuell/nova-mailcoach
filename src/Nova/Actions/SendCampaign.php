<?php

namespace Kraenkvisuell\NovaMailcoach\Nova\Actions;

use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;

class SendCampaign extends Action
{
    public function name()
    {
        return __('send campaign to list');
    }

    public function handle(ActionFields $fields, Collection $models)
    {
        $models[0]->send();
    }

    public function fields()
    {
        return [];
    }
}
