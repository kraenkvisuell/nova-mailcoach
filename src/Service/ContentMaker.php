<?php

namespace Kraenkvisuell\NovaMailcoach\Service;

use Spatie\Mailcoach\Models\Campaign;

class ContentMaker
{
    public function makeHtml(Campaign $campaign)
    {
        $blocks = json_decode($campaign->getStructuredHtml()) ?: [];

        $html = view('nova-mailcoach::body')
            ->with([
                'blocks' => $blocks,
                'webViewUrl' => $campaign->webviewUrl(),
                'subject' => $campaign->subject
            ])
            ->render();

        return $html;
    }
}
