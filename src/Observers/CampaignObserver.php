<?php

namespace Kraenkvisuell\NovaMailcoach\Observers;

use Spatie\Mailcoach\Models\Campaign;
use Facades\Kraenkvisuell\NovaMailcoach\Service\ContentMaker;

class CampaignObserver
{
    public function saving(Campaign $campaign)
    {
        $subject = $campaign->subject_field;
        unset($campaign->subject_field);

        $campaign->unsetEventDispatcher();

        if ($subject) {
            $campaign->subject($subject);
        }

        $campaign->content(ContentMaker::makeHtml($campaign));
    }
}
