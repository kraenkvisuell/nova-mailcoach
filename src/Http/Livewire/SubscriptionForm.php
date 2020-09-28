<?php
namespace Kraenkvisuell\NovaMailcoach\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Spatie\Mailcoach\Models\EmailList;
use Spatie\Mailcoach\Models\Subscriber;
use Spatie\Mailcoach\Enums\SubscriptionStatus;
use Spatie\Mailcoach\Http\Front\Requests\CreateSubscriptionRequest;

class SubscriptionForm extends Component
{
    public $gender = 'm';
    public $privacyAccepted = false;
    public $email;
    public $first_name;
    public $last_name;
    public $city;

    public $genders = [
        'm' => 'Herr',
        'f' => 'Frau',
    ];

    public function render()
    {
        return view('nova-mailcoach::livewire.subscription-form');
    }

    public function submit()
    {
        $this->validate(
            [
                'email' => 'required|email',
                'first_name' => 'required',
                'last_name' => 'required',
                'privacyAccepted' => 'accepted',
            ],
            [],
            [
                'email' => 'Email-Addresse',
                'first_name' => 'Vorname',
                'last_name' => 'Nachname',
                'privacyAccepted' => 'Hinweis',
            ]
        );

        $subscriberAttributes = [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'extra_attributes' => [
                'gender' => $this->gender,
                'city' => $this->city,
            ],
        ];

        $emailList = EmailList::where('allow_form_subscriptions', true)->first();

        if ($emailList->getSubscriptionStatus($this->email) === SubscriptionStatus::SUBSCRIBED) {
            return response()->view('mailcoach::landingPages.alreadySubscribed');
        }

        $subscriber = Subscriber::createWithEmail($this->email)
            ->withAttributes($subscriberAttributes)
            ->subscribeTo($emailList);

        return redirect(
            $subscriber->isUnconfirmed()
            // ? '/confirm-subscription/'.$subscriber->uuid
            ? route('nova-mailcoach.confirm-subscription', ['subscriberUuid' => $subscriber->uuid])
            : route('nova-mailcoach.subscribed', ['subscriberUuid' => $subscriber->uuid])
        );
    }
}
