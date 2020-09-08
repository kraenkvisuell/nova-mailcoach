<?php

namespace Kraenkvisuell\NovaMailcoach\Nova;

use Armincms\Json\Json;
use Laravel\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Select;

class Subscriber extends Resource
{
    public static $model = \Spatie\Mailcoach\Models\Subscriber::class;

    public static $title = 'email';

    public static $displayInNavigation = false;

    public static $search = [
        'first_name', 'last_name', 'email',
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
            Stack::make('Details', [
                Line::make(__('e-mail'), 'email')
                    ->asHeading(),

                Line::make(__('name'), function () {
                    return trim($this->first_name.' '.$this->last_name) ?: '–';
                }),
            ])
            ->onlyOnIndex(),

            Text::make(__('email'), 'email')
                ->rules('required', 'email')
                ->creationRules('unique:mailcoach_subscribers,email')
                ->updateRules('unique:mailcoach_subscribers,email,{{resourceId}}')
                ->hideFromIndex(),

            Text::make(__('first name'), 'first_name')
                ->hideFromIndex(),

            Text::make(__('last name'), 'last_name')
                ->hideFromIndex(),

            Json::make('extra_attributes', [
                Select::make(__('gender'), 'gender')
                    ->options([
                        'm' => __('male'),
                        'f' => __('female'),
                    ])
                    ->hideFromIndex(),

                Text::make(__('postcode'), 'postcode')
                    ->hideFromIndex(),

                Text::make(__('city'), 'city')
                    ->hideFromIndex(),

                Text::make(__('salutation'), 'salutation')
                    ->hideFromIndex(),

                Text::make(__('title'), 'title')
                    ->hideFromIndex(),
            ]),
        ];
    }
}
