<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/redmond/jquery-ui.css" >

    <script type="text/javascript">
        jQuery.noConflict();
            (function($) {
                $(function(){
                    $( '.datetime' ).datepicker();
                });
            })(jQuery);
    </script>  
    <style>
    .mycart{ color: #4c4c4c; font-weight: bold; text-align: center; margin-top: 24px;
        padding: 24px 8px; font-size: 1.1em; background-color: #a8ceee;}
    .footer_design{ background-color: #07728a; text-align: center; color: #fefefe; padding: 60px;}
    .buy-btn{ margin: 40px auto 60px; width: 200px; display: block; background-color: #ff5c73; }
    .ball{ position: absolute;}
    .pagenate{ width: 200px;margin: 20px auto; }
    table { text-align: center; margin-left: auto; margin-right: auto;}
    th {border:0.5;background-color:#CCFFFF; color:fff; padding:5px 10px; margin:auto 0;}
    td {border: solid 1px #aaa; color:#999; padding:5px 10px;margin:auto 0;}
    .text_1 {text-align:center; margin:20px 0;}
    select { font-size:15px; border:1px solid #999;}
    .error { font-size:15px; color:red;}
    .button { text-align:center; margin:15px auto;}
    .button form { display: inline-block;}
    .button form input{ padding: 0.5em 1em; text-decoration: none; background: #668ad8;
        color: #FFF; border-bottom: solid 4px #627295; border-radius: 3px;}
    .number { width: }
    .table-cs { min-width: 80%;max-width:80%;text-align: center; margin-left: auto; margin-right: auto;}
    .datetime { position: relative; z-index: 5;}
    .table-css tr th { background: #FFFFCC; width:200px;}
    .table-css tr td { width:85%; }
    .text-css {text-align:center; margin:10px 0;}
    .reply {min-width: 83%;max-width:83%;text-align: center; margin-left: auto; margin-right: auto;}
    .reply_css {font-size: 1.5em; text-align:center;margin:20px 0;}
    .text_css { margin:25px 295px;}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" style="margin:10px 0 0 0;" href="{{ url('/') }}">
                    <h2>OrderSystem<h2>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @unless (Auth::guard('admin')->check())
                            <li class="nav-item" style="margin:-35px 0">
                                <a class="nav-link" href="{{ route('admin.login') }}">{{ __('ログイン') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="margin:-35px 0">
                                    {{ __('メニュー') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('adminhome')}}">
                                        {{ __('ホーム') }}
                                    </a>
                                    <a class="dropdown-item" href="{{route('order')}}">
                                        {{ __('注文内容一覧') }}
                                    </a>
                                    <a class="dropdown-item" href="{{route('myproduct')}}">
                                        {{ __('商品一覧') }}
                                    </a>
                                    <a class="dropdown-item" href="{{route('addto')}}">
                                        {{ __('商品追加') }}
                                    </a>
                                    <a class="dropdown-item" href="{{route('admincontact')}}">
                                        {{ __('お問い合わせ返信') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endunless
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>