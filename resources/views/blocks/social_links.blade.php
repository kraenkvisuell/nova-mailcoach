<table class="block is-social-links">
    <tr>
        <td>
            @if($attributes->headline)
                <div class="social-links-headline">
                    {{ $attributes->headline }}
                </div>
            @endif

            @if($attributes->hashtag)
                <div class="hashtag">
                    {{ (substr($attributes->hashtag, 0, 1) != '#' ? '#' : '').$attributes->hashtag }}
                </div>
            @endif

            @if(is_array($attributes->links))
                <div class="social-icons-container">
                    @foreach($attributes->links as $link)
                        <a href="{{ $link->attributes->url }}" class="icon">
                            <img src="{{ mailcoachGetMediaUrl($link->attributes->icon) }}">
                        </a>
                    @endforeach
                </div>
            @endif

        </td>
    </tr>
</table>
