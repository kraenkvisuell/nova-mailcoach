<?php

namespace Kraenkvisuell\NovaMailcoach\Metrics;

use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;
use Spatie\Mailcoach\Models\Campaign;

class OpenRate extends Partition
{
    public function name()
    {
        return __('opens');
    }

    public function calculate(Request $request)
    {
        $campaign = Campaign::find($request->resourceId);

        return $this->result([
            __('opened') => $campaign->unique_open_count,
            __('not opened') => $campaign->sent_to_number_of_subscribers - $campaign->unique_open_count,
        ])
        ->colors([
            __('opened') => 'green',
            __('not opened') => 'red',
        ]);
    }

    public function uriKey()
    {
        return 'open-rate';
    }
}
