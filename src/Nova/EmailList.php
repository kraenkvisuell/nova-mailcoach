<?php

namespace Kraenkvisuell\NovaMailcoach\Nova;

use Kraenkvisuell\Tabs\Tabs;
use Laravel\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Kraenkvisuell\Tabs\TabsOnEdit;

class EmailList extends Resource
{
    use TabsOnEdit;

    public static $model = \Spatie\Mailcoach\Models\EmailList::class;

    public function title()
    {
        return $this->name;
    }

    public static $group = 'Newsletter';

    public static $search = [
        'name',
    ];

    public static function label()
    {
        return 'Empfänger-Listen';
    }

    public static function singularLabel()
    {
        return 'Empfänger-Liste';
    }

    public function fields(Request $request)
    {
        $tabs = [
            'Main' => [
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
            ],
        ];

        return [
            (new Tabs('Seite', $tabs))->withToolbar(),
        ];
    }
}
