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
        $salutation = 'Sehr geehrte';
        if ($pendingSend->subscriber->gender == 'm') {
            $salutation .= 'r Herr ';
        } else {
            $salutation .= ' Frau ';
        }
        $salutation .= $pendingSend->subscriber->extra_attributes->title
                       .' '.$pendingSend->subscriber->last_name;

        return str_ireplace('::salutation::', $salutation, $html);
    }
}
