<?php

namespace Kraenkvisuell\NovaMailcoach\Nova\Actions;

use Illuminate\Support\Str;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Spatie\Mailcoach\Models\Campaign;

class DuplicateCampaign extends Action
{
    public function name()
    {
        return __('duplicate campaign');
    }

    public function handle(ActionFields $fields, Collection $models)
    {
        $name = $models[0]->name;
        if (stristr($name, '(')) {
            $name = trim(substr($name, 0, strrpos($name, '(')));
        }

        $count = Campaign::where('name', $name)->count();
        if ($count) {
            $count += Campaign::where('name', 'like', $name . ' (%')->count() + 1;
            $name .= ' ('.$count.')';
        }

        Campaign::create([
            'name' => $name,
            'status' => 'draft',
            'uuid' => Str::uuid(),
            'email_list_id' => $models[0]->email_list_id,
            'from_email' => $models[0]->from_email,
            'from_name' => $models[0]->from_name,
            'subject' => $models[0]->subject,
            'html' => $models[0]->html,
            'structured_html' => $models[0]->structured_html,
        ]);
    }

    public function fields()
    {
        return [];
    }
}
