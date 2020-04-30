@extends('layouts.test')

@section('content')
  <div class="content">
    <div class="main">
    <nav class="nav">
      <div class="sticky">
       <div class="nav-main">
           <h2 class="radius">Collection</h2>
           <ul class="left">
{{--更新順にアイテム取得--}}
                <li>
                  <a class="new_btn" href="/home?new_id=1">new items</a>
                </li>
{{--売れ筋----------------}}
                <li>
                  <a href="/home?best_id=2">best-seller</a>
                </li>
                <li>
                  <a href="/home?category=limited">limited</a>
                </li>
                <li>
                  <a href="/home?category=gift">gift</a>
                </li>
                <li>
                  <a href="/home?category=restock">restock</a>
                </li>
                <li>
                  <a href="/home?category=sale">sale</a>
                </li>
           </ul>
       </div>
       <div class="nav-inner">
           <h2 class="radius">Category</h2>
           <ul class="left">
               <li>
                 <a href="/home?category=goods">stationary</a>
               </li>
               <li>
                 <a href="/home?category=fashion">fashion</a>
               </li>
               <li>
                 <a href="/home?category=funiture">funiture</a>
               </li>
               <li>
                 <a href="/home?category=books">books</a>
               </li>
               <li>
                 <a href="/home?category=glossary">glossary</a>
               </li>
               <li>
                 <a href="/home?category=tech">tech</a>
               </li>
               <li>
                 <a href="/home?category=other">other</a>
               </li>
           </ul>
       </div>
     </div>
   </nav>

    {{--エラー表示--}}
    @if ($errors->any())
      <p>
        @foreach ($errors->all() as $err)
        {{$err}}<br>
        @endforeach
      </p>
    @endif
    <ul class="item-list">
      @foreach ($items as $item)

      <li>
        <div class="item">
          <form action="{{route('click', ['item_id' => $item->id])}}" method="post">
            @csrf

            @if ($item->itemStock->stock > 0)
            <a href="{{route('put', ['item_id' => $item->id])}}"><img class="item-img" src = "/storage/images/{{$item->img_name}}"></a>
            @else
            <a href="#"><img class="item-img" src = "/storage/images/{{$item->img_name}}"></a>
            @endif

            <div class="item-info">

              @if($item->like_users()->where('user_id',Auth::id())->first())
              <a href = "{{route('likes.dislike', ['id'=>$item->id])}}">
                <i class="fas fa-heart"></i>
              </a>
              @else
              <a href = "{{route('likes.like', ['id'=>$item->id])}}">
                <i class="far fa-heart"></i>
              </a>
              @endif


              <span class="item-name">{{$item->name}}</span>
              <span class="item-price">¥{{number_format($item->price)}}</span>
                @if ($item->itemStock->stock === 0)
                    <p class="sold-out">売り切れ</p>
                @else
            </div>
            <input class="cart-btn btn-flat-double-border" type="submit" value="カートに入れる">
                @endif
          </form>
        </div>
      </li>
      @endforeach
     </ul>
   </div>
   <ul class="page">{{ $items->links() }}</ul>
 </div>

@endsection
