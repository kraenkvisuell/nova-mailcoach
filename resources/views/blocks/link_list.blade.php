<table class="block is-link-list">
    <tr>
        <td>

            @if($attributes->headline)
                <div class="link-list-headline">
                    {{ $attributes->headline }}
                </div>
            @endif

            {!! nl2br($attributes->list) !!}

            @if($attributes->button_link)
                <div class="button-container">
                    <a href="{{ $attributes->button_link }}" class="button">
                        {{ $attributes->button_text ?: 'Mehr' }}
                    </a>
                </div>
            @endif

        </td>
    </tr>
</table>
