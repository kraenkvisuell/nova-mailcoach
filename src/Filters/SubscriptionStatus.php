<?php

namespace Kraenkvisuell\NovaMailcoach\Filters;

use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class SubscriptionStatus extends Filter
{
    public function name()
    {
        return __('subscription');
    }
    public $component = 'select-filter';

    public function apply(Request $request, $query, $value)
    {
        if ($value == 'only_subscribed') {
            $query->whereNull('unsubscribed_at');
        } elseif ($value == 'only_unsubscribed') {
            $query->whereNotNull('unsubscribed_at');
        }
        return $query;
    }

    public function options(Request $request)
    {
        return [
            __('only subscribed') => 'only_subscribed',
            __('only unsubscribed') => 'only_unsubscribed',
        ];
    }

    public function default()
    {
        return 'only_subscribed';
    }
}
