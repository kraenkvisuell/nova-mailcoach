<table class="block is-heading">
    <tr>
        <td>
            @if($attributes->topline)
            <p class="topline">
                {{ $attributes->topline }}
            </p>
            @endif

            <h1 class="headline">
                {!! nl2br($attributes->headline) !!}
            </h1>
        </td>
    </tr>
</table>
