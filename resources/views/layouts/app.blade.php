<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Google / Search Engine Tags -->
        <meta itemprop="name" content="{{$pageTitle}}">
        <meta itemprop="description" content="{{ $pageDescription}}">

        <!-- Facebook Meta Tags -->
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{$pageTitle}}">
        <meta property="og:description" content="{{ $pageDescription}}">

        <!-- Twitter Meta Tags -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{$pageTitle}}">
        <meta name="twitter:description" content="{{ $pageDescription}}">

        <!-- title/description -->
        <title>{{$pageTitle}}</title>
        <meta name="description" content="{{ $pageDescription}}">
        <link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}"/>

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.1.0/ui/trumbowyg.css" />
        @yield('css')
        <link rel="stylesheet" href="{{ asset('assets/css/core.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.1.0/trumbowyg.min.js"></script>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        {{ $scripts ?? null }}
        <!--<script src="{{asset('js/func_util.js')}}" defer></script>-->


    </head>
    <body>

        <!-- Page Heading -->
        <x-header/>

        <!-- Page Content -->
        {{ $slot }}

        <!-- Page Footer -->
        <x-footer/>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        @yield('js')
    </body>
</html>
