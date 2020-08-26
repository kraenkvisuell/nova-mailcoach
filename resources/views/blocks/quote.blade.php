<table class="block is-quote">
    <tr>
        <td>
            {!! nl2br($attributes->quote) !!}

            @if($attributes->from)
                <div class="quote-from">
                    {{ $attributes->from }}
                </div>
            @endif
        </td>
    </tr>
</table>
