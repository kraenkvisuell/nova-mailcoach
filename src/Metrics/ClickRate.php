<?php

namespace Kraenkvisuell\NovaMailcoach\Metrics;

use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;
use Spatie\Mailcoach\Models\Campaign;

class ClickRate extends Partition
{
    public function name()
    {
        return __('clicks');
    }

    public function calculate(Request $request)
    {
        $campaign = Campaign::find($request->resourceId);

        return $this->result([
            __('clicked') => $campaign->unique_click_count,
            __('not clicked') => $campaign->sent_to_number_of_subscribers - $campaign->unique_click_count,
        ])
        ->colors([
            __('clicked') => 'green',
            __('not clicked') => 'red',
        ]);
    }

    public function uriKey()
    {
        return 'click-rate';
    }
}
