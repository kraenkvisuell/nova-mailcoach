<?php

namespace Kraenkvisuell\NovaMailcoach\Policies;

use App\User;
use Spatie\Mailcoach\Models\Campaign;

class CampaignPolicy
{
    public function update(User $user, Campaign $campaign)
    {
        return $campaign->status != 'sent' && $campaign->status != 'sending';
    }

    public function delete(User $user, Campaign $campaign)
    {
        return $campaign->status != 'sent' && $campaign->status != 'sending';
    }

    public function view(User $user, Campaign $campaign)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function sendTestMail(User $user, Campaign $campaign)
    {
        return $campaign->status != 'sent' && $campaign->status != 'sending';
    }

    public function send(User $user, Campaign $campaign)
    {
        return $campaign->status != 'sent' && $campaign->status != 'sending';
    }
}
