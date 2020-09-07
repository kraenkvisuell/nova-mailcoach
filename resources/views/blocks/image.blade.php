<table class="block is-image is-{{ $attributes->width }} is-{{ $attributes->kind }}">
    <tr>
        <td>
            @if($attributes->link)
                <a href="{{ $attributes->link }}">
            @endif
            <img src="{{ mailcoachGetMediaUrl($attributes->image) }}">
            @if($attributes->link)
                </a>
            @endif
        </td>
    </tr>
</table>
