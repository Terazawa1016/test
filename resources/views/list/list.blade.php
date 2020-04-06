@extends('layouts.list')

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
    <ul class="item-list">
      @foreach ($hash as $item)

      <li>
        <div class="item">
          <form action="" method="post">
            @csrf

            <a href="{{$item['link']}}"><img class="item-img" src = "{{$item['img']}}"></a>

            <div class="item-info">

              {{--@if($item->like_users()->where('user_id',Auth::id())->first())
              <a href = "{{route('likes.dislike', ['id'=>$item->id])}}">
                <i class="fas fa-heart"></i>
              </a>
              @else
              <a href = "{{route('likes.like', ['id'=>$item->id])}}">
                <i class="far fa-heart"></i>
              </a>
              @endif--}}


              <span class="item-name">{{$item['title']}}</span>
              <span class="item-price">{{$item['date']}}</span>
            </div>
            <input class="" type="submit" value="">
          </form>
        </div>
      </li>
      @endforeach
     </ul>
   </div>

@endsection
