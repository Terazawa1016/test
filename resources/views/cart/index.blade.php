@extends('layouts.shop')

@section('content')
  <div class="content">
    {{--エラー表示--}}
    @if ($errors->any())
      <p>
        @foreach ($errors->all() as $err)
        {{$err}}<br>
        @endforeach
      </p>
    @endif
    <h1 class="title">カート</h1>
    <a href="{{route('home')}}" class="btn-flat-border2">買い物を続ける</a>
    <ul class="cart-list">
      @php
      $sum_price = 0;
      @endphp

      @foreach ($items->all() as $item)
      <li>

<!--カート内商品を表示-->

        <div class="cart-item">
          <img class="cart-item-img" src = "/storage/images/{{$item->item->img_name}}">
          <span class="cart-item-name">{{$item->item->name}}</span>
<!--削除した際にこのページを表示する-->
          <form class="cart-item-del" action="{{route('cart.delete',['item_id' => $item->id])}}" method="post">
            @csrf
            <input type="submit" value="削除">
          </form>
          <span class="cart-item-price">¥{{$item->item->price}}</span>

<!--数量の値をPOSTで送る-->

          <form class="form_select_amount" id="form_select_amount" action="{{route('cart.change',['item_id' => $item->id])}}" method="post">
            @csrf
            <input type="text" class="cart-item-num2" min="0" name="amount" value={{$item->amount}}>個&nbsp;
            <input type="submit" value="変更する">
          </form>
        </div>
      </li>

      @php
      $sum_price += $item->item->price * $item->amount;
      @endphp

      @endforeach
    </ul>

    <div class="buy-sum-box">
      <span class="buy-sum-title">合計</span>
      <span class="buy-sum-price">¥{{$sum_price}}</span>
    </div>
    <div>

<!--購入結果ページへ"id"を送る-->

      <form action="{{route('finish')}}" method="get">
        <input class="buy-btn" type="submit" value="購入する">
      </form>
    </div>
  </div>
@endsection
