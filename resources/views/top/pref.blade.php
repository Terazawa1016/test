@extends('layouts.top')

@section('content')

<div class="wrap flc">
  <div class="main">
         <div class="topic-list-wrap">
           <div class="tab-wrap">
             <div class="tab tab-rank on">
               <a href="{{route('like')}}">
               <span class="icon-rank"></span><h1>トピックでチャット</h1>
             </a>
           </div>
             <div class="tab tab-new"><a href="{{route('top')}}"><span class="icon-rank"></span>
               新着ニュース</a>
             </div>
           </div>

           <div class="topic-list-header mb20">

             <h2>人気トピック</h2>

           </div>

           <ul class="topic-list">
             @foreach($hash as $item)
             <li class="flc">
                <img src="{{$item['img']}}" width="60" height="60" class="img"/>

                <form method="post" action="{{route('chat')}}">
                  @csrf
                  <input type="hidden" name="link" value="{{$item['link']}}">
                  <input type="hidden" name="title" value="{{$item['title']}}" />
                  <input type="hidden" name="img" value="{{$item['img']}}">
                  <a class="article_btn title">{{$item['title']}}</a>

                </form>

                {{--いいねアイコン表示------------------------------------------------------------}}

                                  <form class="like" method="post" action="{{route('favorite')}}">
                                    @csrf
                                      <input type="hidden" name="link" value="{{$item['link']}}" />
                                      <input type="hidden" name="title" value="{{$item['title']}}" />
                                      <i class="like_btn far fa-square"></i>
                                      いいね:{{$item['count']}}
                                  </form>

                {{--ここまで----------------------------------------------------------------------}}

            </li>
            @endforeach
          </ul>

          <ul class="pager">{{ $hash->links() }}</ul>
        </div>

      <div class="tablet-sub tablet-sub-list">
          <div class="topic-wrap">
            <div class="topic-list-wrap">
              <h2 class="rank"><a href="{{$topic['link']}}" class="head-link">新着トピック</a><a href="{{route('like')}}" class="show-more">続きを見る<span class="icon-arrow_r"></span></a>
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
      <p class="head"><a href="{{route('like')}}" class="head-link">新着トピック</a></p>
      <ul>
          <li class="flc">
            <a href="{{$topic['link']}}">
            <div class="info">
              <p class="title">{{$topic['title']}}</p>
              <p class="comment"><span class="icon-comment"></span></p>
            </div>
          </a>
          </li>
        </ul><a href="{{route('like')}}" class="show-more">続きを見る<span class="icon-arrow_r"></span></a>
      </div>
  </div>
</div>
@endsection
