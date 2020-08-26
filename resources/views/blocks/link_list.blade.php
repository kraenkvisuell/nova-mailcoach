<table class="block is-link-list">
    <tr>
        <td>
            @if($attributes->headline)
                <div class="link-list-headline">
                    {{ $attributes->headline }}
                </div>
            @endif

            {!! nl2br($attributes->list) !!}

        </td>

        <td class="list-button-container">
            @if($attributes->button_image)

                <a href="{{ $attributes->button_link }}">
                    <img src="{{ mailcoachGetMediaUrl($attributes->button_image) }}">
                </a>
            @endif

        </td>
    </tr>
</table>
