<?php

namespace Kraenkvisuell\NovaMailcoach\Nova;

use Carbon\Carbon;
use Manogi\Tiptap\Tiptap;
use Laravel\Nova\Resource;
use Illuminate\Http\Request;
use Kraenkvisuell\Tabs\Tabs;
use Laravel\Nova\Fields\Line;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Stack;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Textarea;
use Kraenkvisuell\Tabs\TabsOnEdit;
use Laravel\Nova\Fields\BelongsTo;
use OptimistDigital\MediaField\MediaField;
use Whitecube\NovaFlexibleContent\Flexible;
use Kraenkvisuell\NovaMailcoach\Nova\EmailList;
use Kraenkvisuell\NovaMailcoach\Metrics\OpenRate;
use Kraenkvisuell\NovaMailcoach\Metrics\ClickRate;
use Kraenkvisuell\NovaMailcoach\Metrics\DeliveryRate;
use Kraenkvisuell\NovaMailcoach\Nova\Actions\SendCampaign;
use Kraenkvisuell\NovaMailcoach\Nova\Actions\SendCampaignTest;
use Kraenkvisuell\NovaMailcoach\Nova\Actions\DuplicateCampaign;

class Campaign extends Resource
{
    use TabsOnEdit;

    public static $model = \Spatie\Mailcoach\Models\Campaign::class;

    public static $title = 'name';

    public static function group()
    {
        return ucfirst(__('newsletter'));
    }

    public static $search = [
        'name',
    ];

    public static function label()
    {
        return __('campaigns');
    }

    public static function singularLabel()
    {
        return __('campaign');
    }

    public function fields(Request $request)
    {
        $tabs = [
            __('preview') => [
                Text::make(__('content'), function () {
                    return $this->html;
                })
                ->asHtml()
                ->stacked()
                ->onlyOnDetail(),
            ],
            'Main' => [
                Text::make(__('campaign title'), 'name')
                    ->rules('required')
                    ->creationRules('unique:mailcoach_campaigns,name')
                    ->updateRules('unique:mailcoach_campaigns,name,{{resourceId}}')
                    ->hideFromIndex(),

                Text::make(__('subject'), 'subject_field')
                    ->rules('required')
                    ->withMeta(['value' => $this->getOriginal('subject')])
                    ->hideFromIndex(),

                BelongsTo::make(__('recipient list'), 'emailList', EmailList::class)
                    ->hideFromIndex(),

                Text::make(__('sender E-mail'), 'from_email')
                    ->rules('nullable', 'email')
                    ->help(__('if different from sender of recipient list'))
                    ->hideFromIndex(),

                Text::make(__('sender name'), 'from_name')
                    ->help(__('if different from sender of recipient list'))
                    ->hideFromIndex(),

                Boolean::make(__('track opens'), 'track_opens')
                    ->hideFromIndex(),

                Boolean::make(__('track clicks'), 'track_clicks')
                    ->hideFromIndex(),
            ],
            ucfirst(__('content')) => [
                Flexible::make(__('content'), 'structured_html')
                    ->addLayout(__('headline'), 'heading', [
                        Textarea::make(__('topline'), 'topline')
                            ->stacked()
                            ->rows(2),
                        Textarea::make(__('headline'), 'headline')
                            ->stacked(),
                    ])
                    ->addLayout(__('text'), 'text', [
                        Tiptap::make(__('content'), 'content')
                            ->buttons([
                                'heading',
                                'bold',
                                'italic',
                                'link',
                            ])
                            ->headingLevels([2,3,4])
                            ->stacked(),
                        Select::make(__('text size'), 'text_size')
                            ->options([
                                'regular' => __('regular'),
                                'large' => __('large'),
                                'small' => __('small'),
                            ]),
                        Select::make(__('text alignment'), 'text_alignment')
                            ->options([
                                'left' => __('left'),
                                'centered' => __('centered'),
                                'right' => __('right'),
                            ]),
                        Select::make(__('width'), 'width')
                            ->options([
                                '100' => '100%',
                                '66' => '66% (100% on Smartphone)',
                                '50' => '50% (66% on Smartphone)',
                            ]),
                        Text::make(__('button link'), 'button_link')
                            ->help(__('should start with https:// or mailto:')),
                        Text::make(__('button text'), 'button_text'),
                    ])
                    ->addLayout(__('image'), 'image', [
                        MediaField::make(__('image'), 'image')
                            ->collection('newsletter'),
                        Select::make(__('width'), 'width')
                            ->options([
                                '100' => '100%',
                                '66' => '66%',
                            ]),
                        Select::make(__('kind'), 'kind')
                            ->options([
                                'transparent' => __('transparent'),
                            ]),
                        Text::make(__('link'), 'link')
                            ->help(__('should start with https:// or mailto:')),
                    ])
                    ->addLayout(__('quote'), 'quote', [
                        Textarea::make(__('quote'), 'quote')
                            ->stacked(),
                        Text::make(__('from'), 'from'),
                    ])
                    ->addLayout(__('link list'), 'link_list', [
                        Textarea::make(__('headline'), 'headline')
                            ->rows(2)
                            ->stacked(),
                        Tiptap::make(__('list'), 'list')
                            ->buttons([
                                'bullet_list',
                                'link',
                            ])
                            ->stacked(),
                        Text::make(__('button link'), 'button_link')
                            ->help(__('should start with https:// or mailto:')),
                        MediaField::make(__('button image'), 'button_image')
                            ->collection('buttons'),
                    ])
                    ->addLayout(__('social links'), 'social_links', [
                        Text::make(__('headline'), 'headline'),
                        Text::make(__('hashtag'), 'hashtag'),
                        Flexible::make(__('links'), 'links')
                            ->addLayout(__('link'), 'link', [
                                MediaField::make(__('icon'), 'icon')
                                    ->collection('newsletter-icons'),
                                Text::make('URL', 'url')
                                    ->help(__('should start with https:// or mailto:')),
                            ])
                            ->button(__('add social link'))
                            ->stacked()
                    ])
                    ->addLayout(__('divider'), 'divider', [

                    ])
                    ->button(__('add content block'))
                    ->hideFromDetail()
                    ->stacked()
            ],
        ];

        return [
            Stack::make('Details', [
                    Line::make(__('campaign title'), 'name')
                        ->asHeading(),

                    Line::make(__('recipient list'), function () {
                        return __('email list').': '.$this->emaillist->name;
                    })
                    ->asSmall(),
                ])
                ->onlyOnIndex(),
            Text::make(__('status'), function () {
                if ($this->status == 'sent') {
                    return __('sent at').' '.Carbon::parse($this->sent_at)->format('d.m.Y, H:i:s')
                        .'<br>'.str_replace('{number}', $this->sent_to_number_of_subscribers, __('to {number} recipient(s)'));
                }

                return __($this->status);
            })
            ->asHtml()
            ->onlyOnIndex(),
            (new Tabs(__('campaign'), $tabs))->withToolbar(),
        ];
    }

    public function actions(Request $request)
    {
        return [
            (new SendCampaignTest)
                ->showOnTableRow()
                ->showOnDetail()
                ->exceptOnIndex()
                ->confirmButtonText(__('send test e-mail'))
                ->canSee(function () {
                    return auth()->user()->can('sendTestMail', $this->resource);
                }),
            (new SendCampaign)
                ->showOnDetail()
                ->exceptOnIndex()
                ->confirmButtonText(__('send campaign to list'))
                ->canSee(function () {
                    return auth()->user()->can('send', $this->resource);
                }),
            (new DuplicateCampaign)
                ->showOnTableRow()
                ->exceptOnIndex()
                ->confirmButtonText(__('duplicate campaign'))
                ->canRun(function ($request, $model) {
                    return auth()->user()->can('duplicate', $this->resource);
                }),
        ];
    }

    public function cards(Request $request)
    {
        $cards = [];

        $campaign = $request->resourceId ? \Spatie\Mailcoach\Models\Campaign::find($request->resourceId) : null;
        if (optional($campaign)->isSent()) {
            $cards[] = (new DeliveryRate)->onlyOnDetail();

            if ($campaign->track_opens) {
                $cards[] = (new OpenRate)->onlyOnDetail();
            }

            if ($campaign->track_clicks) {
                $cards[] = (new ClickRate)->onlyOnDetail();
            }
        }

        return $cards;
    }
}
