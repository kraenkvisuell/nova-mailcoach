<?php

namespace Kraenkvisuell\NovaMailcoach\Policies;

use App\User;
use Spatie\Mailcoach\Models\Subscriber;

class SubscriberPolicy
{
    public function update(User $user, Subscriber $subscriber)
    {
        return true;
    }

    public function delete(User $user, Subscriber $subscriber)
    {
        return true;
    }

    public function view(User $user, Subscriber $subscriber)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function resubscribe(User $user, Subscriber $subscriber)
    {
        if (!$subscriber->id) {
            return true;
        }
        return $subscriber->unsubscribed_at != null;
    }

    public function unsubscribe(User $user, Subscriber $subscriber)
    {
        if (!$subscriber->id) {
            return true;
        }
        return $subscriber->unsubscribed_at == null;
    }
}
