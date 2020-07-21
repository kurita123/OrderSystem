<!Doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <style>
    html {height: 100%;}
    body {min-height: 100vh;display: flex;flex-flow: column;}
    .content {flex: 1;}
    .footer {font-size:30px; background-color:#3490dc; text-align:right; color:white; margin:-25px 0;}
    .example {position: relative;}
    .example p {position:absolute; color:white; font-weight: bold; font-size: 3em; font-family :Quicksand, sans-serif; top: 35%; left: 50%;
      -ms-transform: translate(-50%,-50%);-webkit-transform: translate(-40%,-50%);transform: translate(-40%,-50%);margin:0;padding:0;}
    .example-cs p {position:absolute; color:white; font-weight: bold; font-size: 3em; font-family :Quicksand, sans-serif; top: 70%; left: 53%;
      -ms-transform: translate(-50%,-50%);-webkit-transform: translate(-60%,-50%);transform: translate(-60%,-50%);margin:0;padding:0;}
    .header {font-size:40pt; text-align:center; color:#f6f6f6; background-color:#3490dc;
    margin: 0px 0px 0px 0px; letter-spacing;-4pt;}
    .example img { width:100%; max-width:100%; height:auto;}
    </style>

</head>
<body>
    <header class="header">発注システム</header>
    <div class="content">
        @yield('content')　
    </div>
    <footer class="footer">kurita ポートフォリオ</footer>
</body>
</html>
