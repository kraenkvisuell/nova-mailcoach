<?php

namespace Kraenkvisuell\NovaMailcoach\Http\Controllers;

use Illuminate\Routing\Controller;
use Spatie\Mailcoach\Models\Subscriber;

class ConfirmSubscriptionController extends Controller
{
    public function index(string $subscriberUuid)
    {
        $subscriber = Subscriber::findByUuid($subscriberUuid);

        return view('mailcoach::landingPages.confirmSubscription', compact('subscriber'));
    }
}
