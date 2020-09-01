<?php

namespace Kraenkvisuell\NovaMailcoach\Replacers;

use Spatie\Mailcoach\Models\Send;
use Spatie\Mailcoach\Support\Replacers\PersonalizedReplacer;

class SalutationReplacer implements PersonalizedReplacer
{
    public function helpText(): array
    {
        return [
            'salutation' => 'the personalized salutation',
        ];
    }

    public function replace(string $html, Send $pendingSend): string
    {
        $salutation = $pendingSend->subscriber->extra_attributes->salutation
            .' '.$pendingSend->subscriber->extra_attributes->title
            .' '.$pendingSend->subscriber->first_name
            .' '.$pendingSend->subscriber->last_name;

        return str_ireplace('::salutation::', $salutation, $html);
    }
}
