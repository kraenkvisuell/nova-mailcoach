<?php

namespace Kraenkvisuell\NovaMailcoach\Metrics;

use Illuminate\Http\Request;
use Laravel\Nova\Metrics\Partition;
use Spatie\Mailcoach\Models\Campaign;

class DeliveryRate extends Partition
{
    public function name()
    {
        return __('delivery');
    }

    public function calculate(Request $request)
    {
        $campaign = Campaign::find($request->resourceId);

        $bounced = $campaign->sends()->bounced()->count();
        $failed = $campaign->sends()->failed()->count();
        $pending = $campaign->sends()->pending()->count();
        $delivered = $campaign->sends()->sent()->count() - $bounced;

        return $this->result([
            __('delivered') => $delivered,
            __('pending') => $pending,
            __('bounced') => $bounced,
            __('failed') => $failed,
        ])
        ->colors([
            __('delivered') => 'green',
            __('pending') => 'grey',
            __('bounced') => 'orange',
            __('failed') => 'red',
        ]);
    }

    public function uriKey()
    {
        return 'delivery-rate';
    }
}
