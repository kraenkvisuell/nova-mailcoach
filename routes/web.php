<?php

use Illuminate\Support\Facades\Route;
use Kraenkvisuell\NovaMailcoach\Http\Controllers\SubscriptionController;
use Kraenkvisuell\NovaMailcoach\Http\Controllers\ConfirmSubscriptionController;

Route::get('/subscription', [SubscriptionController::class, 'index'])
    ->name('nova-mailcoach.subscription')
    ->middleware('web');

Route::get('/subscribed/{subscriberUuid}', [SubscribedController::class, 'index'])
    ->name('nova-mailcoach.subscribed')
    ->middleware('web');

Route::get('/confirm-your-subscription/{subscriberUuid}', [ConfirmSubscriptionController::class, 'index'])
    ->name('nova-mailcoach.confirm-subscription')
    ->middleware('web');
