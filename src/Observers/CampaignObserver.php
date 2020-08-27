<?php

namespace Kraenkvisuell\NovaMailcoach\Observers;

use Illuminate\Support\Str;
use Spatie\Mailcoach\Models\Campaign;
use Facades\Kraenkvisuell\NovaMailcoach\Service\ContentMaker;

class CampaignObserver
{
    public function saving(Campaign $campaign)
    {
        $campaign->unsetEventDispatcher();

        $subject = $campaign->subject_field;
        unset($campaign->subject_field);
        $campaign->subject = $subject;

        if (!$campaign->uuid) {
            $campaign->uuid = Str::uuid();
        }
        if (!$campaign->status) {
            $campaign->status = 'draft';
        }

        $campaign->content(ContentMaker::makeHtml($campaign));
    }
}
