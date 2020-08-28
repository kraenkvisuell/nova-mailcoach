<x-layout :subject="$subject" :webViewUrl="$webViewUrl">

@foreach($blocks as $block)
    @includeIf('nova-mailcoach::blocks.'.$block->layout, ['attributes' => $block->attributes])
@endforeach

</x-layout>
