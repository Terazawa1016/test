<!DOCTYPE html>
<html lang="ja">
<head>
   <meta charset="UTF-8">
   <title>TOP</title>
   <link href="{{ asset('css/top.css') }}" rel="stylesheet">
   <link href="{{ asset('css/second.css') }}" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

</head>
<body>
    <header>
        <div class="header-main">
            <div class="header-logo">
                <img src="/storage/images/logo.png">
            </div>
            {{--<div class="header-form">
                <form action="#">
                <input class="form" type="text" name="search" size="30" placeholder="料理名・食材名で検索">
                <input type="submit" value="レシピで検索">
                </form>
            </div>--}}
        </div>
        <nav>
            <ul class="header-list">
                <li><a href="#">new</a></li>
                <li><a href="#">trend</a></li>
                <li><a href="#">topic</a></li>
                <li><a href="#">season</a></li>
                <li><a href="#">ranking</a></li>
            </ul>
        </nav>
    </header>

    @yield('content')

    <footer>
        <nav>
        <ul class="flex-bottom">
            <li><a href="#" target="_blank">サイトマップ</a></li>
            <li><a href="#" target="_blank">プライバシーポリシー</a></li>
            <li><a href="#" target="_blank">お問い合わせ</a></li>
            <li><a href="#" target="_blank">ご利用ガイド</a></li>
        </ul>
        </nav>
        <p><small>copyright &#169; CodeCamp All Rights Reserved.</small></p>
    </footer>
</body>
</html>
