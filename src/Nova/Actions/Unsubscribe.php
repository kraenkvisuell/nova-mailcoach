<?php

namespace Kraenkvisuell\NovaMailcoach\Nova\Actions;

use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;

class Unsubscribe extends Action
{
    public function name()
    {
        return ucfirst(__('unsubscribe'));
    }

    public function handle(ActionFields $fields, Collection $models)
    {
        $models[0]->unsubscribed_at = now();
        $models[0]->save();
    }

    public function fields()
    {
        return [];
    }
}
