<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>



    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8534851946321815"
     crossorigin="anonymous"></script>

</head>
<body>
        <header id="header">
        　　<div class="logo">
             <a href="{{route('home')}}">{{ config('app.name') }}</a>
          </div>
          <div class="smart-menu">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>     
          </div> 
          <div class="menu">
                <div class="item"><a href="{{route('question', 1)}}">悩みを聞いてほしい</a></div>
                <div class="item"><a href="{{route('question', 2)}}">他のホテルの意見を聞きたい</a></div>
                @guest
                <div class="item"><a href="{{route('register')}}">ユーザー登録</a></div>
                @else
                <div class="item"><a href="{{route('question.new')}}">質問投稿</a></div>
                <div class="item"><a href="{{route('myquestion.show')}}">自分の投稿</a></div>
                 <div class="item"><a href="{{route('profile.edit')}}">プロフィール</a></div>
                @endguest
   
                @guest
                <div class="item"><a href="{{ route('login')}}">ログイン</a></div>
                @else
                <div class="item"><a href="{{ route('logout') }}" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('ログアウト') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                　　</form>
                
                </div> 
                @endguest         
          </div> 
        </header>

        <main class="container">
            @yield('content')
        </main>

</body>
</html>
