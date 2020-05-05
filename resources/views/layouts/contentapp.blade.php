<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>SHOP</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/test_small.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/con_small.css') }}"/>


  <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
  <header>
    <div class="header-box">
      <a href="{{route('home')}}">
        <img class="logo" src="/storage/images/logo.png" alt="SHOP">
      </a>
      <div class="header-shop">
<!-- ログイン -->
        <ul class="header-list">
            <li><a href="{{route('home')}}">home</a></li>
            <li><a href="/home?tab_id=1">favorite</a></li>
            <li><a href="{{route('form')}}">form</a></li>
            <li>      
                <form method="get" action="{{route('home')}}" class="logout">
                    @csrf
                    <input class="nemu btn btn-flat-border" type="submit" value="login">
                </form>
            </li>
        </ul>

      </div>
    </div>
  </header>
  @yield('content')
  <footer>
    <p><small> &#169; TestUser All Rights Reserved.</small></p>
</footer>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">

</script>
</body>
</html>
