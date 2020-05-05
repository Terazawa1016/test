<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SHOP</title>
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/test_small.css') }}"/>

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
  
{{-- PayPal決済スクリプト --------------------------------------------------------}}

  <script src="https://www.paypal.com/sdk/js?client-id=AThh_KGgAVaWBMCU4MRNG7ZrkD2SKQhbez_RDFYx_PkIlh-qIcWp0k4IijJqQEmDU_seSWqdKw7l3OYI"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <script>
    paypal.Buttons({
    createOrder: function(data, actions) {

      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '0.01'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        $.ajax({
          url:"{{ route('api.delete.cart',['user_id' => Auth::id()]) }}",
          type:'delete',     
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },    
         })
         .done(function(){
          alert('購入完了 ' + details.payer.name.given_name);
          location.href = "{{ route('cart') }}"
          
         })
         .fail(function(){
          alert('購入失敗 ' + details.payer.name.given_name);
         })
      });
    }



  }).render('#paypal-button-container');

  </script>

  {{-- ここまで ------------------------------------------------------------------}}
</body>
</html>
