<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Laravel 8, Vue.js 3, Tailwind CSS v3.0 SPA (Single Page Application) CRUD using MySQL.">
        <title>Laravel 8, Vue.js 3, Tailwind CSS v3.0 SPA CRUD using MySQL</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" href="/images/favicon.ico" type="image/png">

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
        <link href="{{ mix('/css/plugins.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="root" class="theme-default">
            <router-view></router-view>
        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
