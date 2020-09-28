<!DOCTYPE html>
<html
    lang="{{ app()->getLocale() }}"
    class="h-full"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    </head>
    <body class="
        text-sans leading-normal h-full
    ">
        {{ $slot }}
    </body>
</html>
