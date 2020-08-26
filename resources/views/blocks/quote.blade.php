<table class="block is-quote">
    <tr>
        <td>
            <div class="quote">
            {!! nl2br($attributes->quote) !!}
            </div>

            @if($attributes->from)
                <div class="quote-from">
                    {{ $attributes->from }}
                </div>
            @endif
        </td>
    </tr>
</table>
