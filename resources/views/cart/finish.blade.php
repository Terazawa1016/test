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

    @php
    $sum_price = 0;
    @endphp

    @foreach ($items as $item)
    <div class="finish-msg">ご購入ありがとうございました。</div>
    <div class="cart-list-title">
      <span class="cart-list-price"></span>
      <span class="cart-list-num"></span>
    </div>
      <ul class="cart-list">
        <li>
            <div class="cart-item">
              <img class="cart-item-img" src="/storage/images/{{$item->item->img_name}}">
              <span class="cart-item-name">{{$item->item->name}}</span>
              <span class="cart-item-price">¥{{$item->item->price}}</span>
              <span class="finish-item-price">数量：{{$item->amount}}</span>
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
  </div>
@endsection
