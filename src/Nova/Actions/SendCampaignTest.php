<?php

namespace Kraenkvisuell\NovaMailcoach\Nova\Actions;

use Laravel\Nova\Fields\Text;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Spatie\Mailcoach\Jobs\SendTestMailJob;

class SendCampaignTest extends Action
{
    public function name()
    {
        return __('send test e-mail');
    }

    public function handle(ActionFields $fields, Collection $models)
    {
        session(['mailcoach.test_email' => $fields['recipient']]);

        foreach ($models as $campaign) {
            SendTestMailJob::dispatchNow($campaign, $fields['recipient']);
        }
    }

    public function fields()
    {
        return [
            Text::make(__('recipient email'), 'recipient')
                ->withMeta(['value' => session('mailcoach.test_email')])
                ->rules([
                    'required',
                    'email',
                ]),
        ];
    }
}
