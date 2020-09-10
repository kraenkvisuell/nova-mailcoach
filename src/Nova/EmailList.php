<?php

namespace Kraenkvisuell\NovaMailcoach\Nova;

use Laravel\Nova\Resource;
use Illuminate\Http\Request;
use Kraenkvisuell\Tabs\Tabs;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\HasMany;
use Kraenkvisuell\Tabs\TabsOnEdit;
use Kraenkvisuell\NovaMailcoach\Nova\Actions\ImportSubscribers;

class EmailList extends Resource
{
    public static $model = \Spatie\Mailcoach\Models\EmailList::class;

    public function title()
    {
        return $this->name;
    }

    public static $group = 'Newsletter';

    public static $search = [
        'name'
    ];

    public static function label()
    {
        return __('email lists');
    }

    public static function singularLabel()
    {
        return __('email list');
    }

    public function fields(Request $request)
    {
        return [
            Text::make('Listen-Name', 'name')
                ->rules('required')
                ->creationRules('unique:mailcoach_email_lists,name')
                ->updateRules('unique:mailcoach_email_lists,name,{{resourceId}}'),

            Text::make('Absender-E-Mail', 'default_from_email')
                ->rules([
                    'required',
                    'email',
                ]),

            Text::make('Absender-Name', 'default_from_name')
                ->rules([
                    'required',
                ]),

            HasMany::make(__('subscribers'), 'allSubscribers', 'Kraenkvisuell\NovaMailcoach\Nova\Subscriber'),
        ];
    }

    public function actions(Request $request)
    {
        return [
            (new ImportSubscribers)
                ->showOnDetail()
                ->exceptOnIndex()
                ->confirmButtonText(__('import subscribers')),
        ];
    }
}
