<?php

namespace Kraenkvisuell\NovaMailcoach\Http\Controllers;

use Illuminate\Routing\Controller;
use Spatie\Mailcoach\Models\Subscriber;

class SubscribedController extends Controller
{
    public function index(string $subscriberUuid)
    {
        $suscriber = Subscriber::findByUuid($subscriberUuid);

        return view('mailcoach::landingPages.subscribed', compact('subscriber'));
    }
}
