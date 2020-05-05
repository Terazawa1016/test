<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title>SHOP</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/test_small.css') }}"/>
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
      <!-- <form method="post" class="header-logout" action="{{route('logout')}}">
        @csrf
        <input class="nemu btn btn-flat-border" type="submit" value="ログアウト">
      </form> -->

<!-- ログアウト -->
      <form method="post" action="{{route('logout')}}" class="logout">
        @csrf
        <input class="nemu btn btn-flat-border" type="submit" value="logout">
      </form>

      <a href="{{route('cart')}}" class="header-cart"><i class="cart fas fa-cart-arrow-down fa-2x"></i></a>
      <p class="nemu user_name">user：{{Auth::user()->name}}</p>

        <div class="text-right mb-2">good：
             <span class="badge badge-pill badge-success">{{ $count_favorite }}</span>
        </div>

        <form id="form4" action="" method="get">
          <input id="sbox4"  id="s" name="s" type="text" placeholder="アイテムを探す" />
          <button id="sbtn4" type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </div>

      <nav>
           <ul class="header-list">
               <li><a href="{{route('home')}}">home</a></li>
               <li><a href="/home?tab_id=1">favorite</a></li>
               <li><a href="{{route('rank')}}">ranking</a></li>
               <li><a href="{{route('form')}}">form</a></li>
           </ul>
       </nav>
  </header>
  @yield('content')
  <footer>
    <p><small> &#169; TestUser All Rights Reserved.</small></p>
</footer>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
//
// $(document).ready(function() {
//     $('.like_btn').click(function() {
//         $(this).parent().submit();
//     });
// });

</script>
</body>
</html>
