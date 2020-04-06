<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>SHOP</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
  <header>
    <div class="header-box">
      <a href="{{route('home')}}">
        <img class="logo" src="/storage/images/logo.png" alt="TEST SHOP">
      </a>
      <form method="post" action="{{route('logout')}}">
        @csrf
        <input class="nemu btn btn-flat-border" type="submit" value="logout">
      </form>
      <a href="{{route('cart')}}"><i class="cart fas fa-cart-arrow-down fa-2x"></i></a>
      <p class="nemu user_name">user：{{Auth::user()->name}}</p>
    </div>
  </header>

  @yield('content')
</body>
</html>
