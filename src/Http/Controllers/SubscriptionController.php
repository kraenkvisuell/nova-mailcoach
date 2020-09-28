<?php

namespace Kraenkvisuell\NovaMailcoach\Http\Controllers;

use Illuminate\Routing\Controller;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('mailcoach::landingPages.subscription');
    }
}
