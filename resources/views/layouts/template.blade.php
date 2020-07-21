<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name', '発注システム') }}</title>

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
    th {background-color:#CCFFFF; color:fff; padding:5px 10px; margin:auto 0;}
    td {border: solid 1px #aaa; color:#999; padding:5px 10px;margin:auto 0;}
    .text_1 {text-align:center; margin:20px 0;}
    select { font-size:15px; border:1px solid #999;}
    .error { font-size:15px; color:red;}
    .button { text-align:center;}
    .button form { display: inline-block;}
    .button form input{ padding: 0.5em 1em; text-decoration: none; background: #668ad8;
        color: #FFF; border-bottom: solid 4px #627295; border-radius: 3px;}
    .number { width: }
    .table-cs { min-width: 80%;max-width:80%;text-align: center; margin-left: auto; margin-right: auto;}
    .datetime { position: relative; z-index: 5;}
    .table-css tr th { background: #FFFFCC; width:200px;}
    .table-css tr td { width:85%; }
    .text-css {text-align:center; margin:10px 0;}
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                    <h2>発注システム</h2>
               
                

                    <ul class="navbar-nav ml-auto">
                        @guest
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('メニュー') }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('user/home')}}">
                                        {{ __('ホーム') }}
                                    </a>
                                    <a class="dropdown-item" href="{{route('company')}}">
                                        {{ __('商品一覧') }}
                                    </a>
                                    <a class="dropdown-item" href="{{route('search')}}">
                                        {{ __('発注一覧') }}
                                    </a> 
                                    <a class="dropdown-item" href="{{route('contact')}}">
                                        {{ __('お問い合わせ') }}
                                    </a>    

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
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
