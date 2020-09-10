<?php

namespace Kraenkvisuell\NovaMailcoach\Nova\Actions;

use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;

class Resubscribe extends Action
{
    public function name()
    {
        return __('resubscribe');
    }

    public function handle(ActionFields $fields, Collection $models)
    {
        $models[0]->unsubscribed_at = null;
        $models[0]->save();
    }

    public function fields()
    {
        return [];
    }
}
