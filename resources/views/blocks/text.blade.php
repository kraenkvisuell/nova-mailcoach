<table class="block is-text is-{{ $attributes->width }} is-{{ $attributes->text_size }} is-{{ $attributes->text_alignment }}">
    <tr>
        <td>
            {!! $attributes->content !!}

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
