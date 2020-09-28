<?php

namespace Kraenkvisuell\NovaMailcoach\Observers;

use Illuminate\Support\Str;
use Spatie\Mailcoach\Models\EmailList;

class EmailListObserver
{
    public function saving(EmailList $emailList)
    {
        EmailList::unsetEventDispatcher();

        if (!$emailList->uuid) {
            $emailList->uuid = Str::uuid();
            $emailList->save();
        }

        // Only one list with form subscription allowed at the moment
        if ($emailList->allow_form_subscriptions) {
            $emailList->requires_confirmation = true;
            $emailList->save();

            foreach (EmailList::where('id', '!=', $emailList->id)->get() as $sibling) {
                $sibling->allow_form_subscriptions = false;
                $sibling->requires_confirmation = false;
                $sibling->save();
            }
        }
    }
}
