
<!DOCTYPE html>
<html style="height: 100%"  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Countries</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{ url('logo/vch_logo.png') }}">

        <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">

    </head>

    <body style="height: 100%">

        <div id="app"></div>

        <script src="{{ mix('js/main.js') }}"></script>
    </body>
