@extends('layouts.top')

@section('content')

<div class="wrap flc">
  <div class="main">
         <div class="topic-list-wrap">
           <div class="tab-wrap">
             <div class="tab tab-rank">
               <a href="{{route('like')}}">
               <span class="icon-rank"></span>トピックでチャット
             </a>
           </div>
             <div class="tab tab-new on"><a href="#"><span class="icon-new"></span>
               <h1>新着ニュース</h1></a>
             </div>
           </div>

           <div class="topic-list-header mb20">

             <h2>最新のトピック</h2>

           </div>

{{--記事を表示----------------------------------------------------------------}}
           <ul class="topic-list">
             @foreach($hash as $item)
             <li id="page-content" class="flc"><a href="{{$item['link']}}">
                <img src="{{$item['img']}}" width="60" height="60" class="img"/>
                <div class="info nn">
                  <span class="datetime">{{$item['date']}}</span>
                </div>
                <p class="title">{{$item['title']}}</p></a>

    {{--いいねアイコン表示--}}
                  <form class="like" method="post" action="{{route('favorites')}}">
                    @csrf
                      <input type="hidden" name="link" value="{{$item['link']}}" />
                      <input type="hidden" name="title" value="{{$item['title']}}" />
                      <input type="hidden" name="img" value="{{$item['img']}}">
                      <a class="like_btn btn-flat-border">記事を「いいね」する</a>
                  </form>
            </li>
            @endforeach
          </ul>
{{--ここまで------------------------------------------------------------------}}

{{--ページネーション----------------------------------------------------------}}

        <ul class="pager">
          @for ($i = 0; $i < $pagenate_count; $i++)
            <a href="{{route('top', ['page'=>($i+1)])}}" class="disabled" tabindex="-1"><li><span class="icon-arrow_l">{{$i+1}}</li></a>
          @endfor
        </ul>

{{--ここまで------------------------------------------------------------------}}
      </div>

      <div class="tablet-sub tablet-sub-list">
          <div class="topic-wrap">
            <div class="topic-list-wrap">
              <h2 class="rank"><a href="{{route('pref')}}" class="head-link">人気トピック</a><a href="{{route('pref')}}" class="show-more">続きを見る<span class="icon-arrow_r"></span></a>
              </h2>

              <ul class="topic-list">
	                <li class="flc"><a href="{{$topic['link']}}">
                    <img data-src="https://up.gc-img.net/post_img_web/2020/03/ZvWPa1gc2BR7oe2_4290_s.jpeg" width="60" height="60" class="img lazyload"/>
                    <noscript><img src="https://up.gc-img.net/post_img_web/2020/03/ZvWPa1gc2BR7oe2_4290_s.jpeg"/></noscript>
                    <div class="info">
                      <div class="tag-wrap rank1"><span class="icon-tag"></span>
                        <p class="rank">1<span>位</span></p>
                      </div>
                      <p class="comment"><span class="icon-comment"></span><span></span><span class="datetime"></span></p>
                    </div>
                    <p class="title">{{$topic['title']}}</p></a>
                  </li>
              </ul>

            </div>
        </div>
      </div>
  </div>

  <div class="sub">
    <div class="sub-part sub-topics mb20">
      <p class="head"><a href="{{route('pref')}}" class="head-link">人気トピック</a></p>
      <ul>
          <li class="flc">
            <a href="{{$topic['link']}}">
            <div class="info">
              <p class="title">{{$topic['title']}}</p>
              <p class="comment"><span class="icon-comment"></span></p>
            </div>
          </a>
          </li>
        </ul><a href="{{route('pref')}}" class="show-more">続きを見る<span class="icon-arrow_r"></span></a>
      </div>
  </div>
</div>
@endsection
