<?php

use Illuminate\Support\Facades\Route;

Route::get('/newsletter/webview/{token?}', function () {
    return 'test';
})->name('mailcoach.webview');
