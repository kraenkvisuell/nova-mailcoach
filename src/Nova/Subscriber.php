<?php

namespace Kraenkvisuell\NovaMailcoach\Nova;

use Laravel\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;

class Subscriber extends Resource
{
    public static $model = \Spatie\Mailcoach\Models\Subscriber::class;

    public static $title = 'email';

    public static $displayInNavigation = false;

    public static $search = [
        'email',
    ];

    public static function label()
    {
        return __('subscribers');
    }

    public static function singularLabel()
    {
        return __('subscriber');
    }

    public function fields(Request $request)
    {
        return [
            Text::make(__('email'), 'email'),
        ];
    }
}
