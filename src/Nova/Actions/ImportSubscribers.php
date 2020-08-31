<?php

namespace Kraenkvisuell\NovaMailcoach\Nova\Actions;

use Laravel\Nova\Fields\File;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Laravel\Nova\Fields\ActionFields;
use Kraenkvisuell\NovaMailcoach\Imports\SubscribersImport;
use Spatie\Mailcoach\Models\SubscriberImport;

class ImportSubscribers extends Action
{
    public $onlyOnDetail = true;

    public function name()
    {
        return __('import subscribers');
    }

    public function handle(ActionFields $fields, Collection $models)
    {
        $import = new SubscribersImport($models[0]->id);
        Excel::import($import, $fields->file);

        SubscriberImport::create([
            'email_list_id' => $models[0]->id,
            'status' => 'finished',
            'imported_subscribers_count' => $import->getImportedRowCount(),
            'error_count' => $import->getNotImportedRowCount(),
        ]);

        return Action::message(__('the subscribers are being imported'));
    }

    public function fields()
    {
        return [
            File::make(__('file'), 'file')
                ->acceptedTypes('.xlsx')
                ->rules('required'),
        ];
    }
}
