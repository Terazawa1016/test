@extends('layouts.top')

@section('content')

<div class="wrap flc">
  <div class="main">
    <div class="topic-wrap">
          <div class="head-area"><img src="{{$item['img']}}" width="100" height="100">
          <h1>
            <!-- logly_title_begin -->

            <a href="{{$item['link']}}">{{$item['title']}}</a>

            <!-- logly_title_end -->
          </h1>
             <a href="#form" class="btn btn-positive">コメントを投稿する</a>
           </div>

         <div class="body-area">
           <ul class="topic-comment">
             @foreach($chat_items as $key=>$value)
{{--コメント表示--}}
             <li class="comment-item" id="comment1">
               <p class="info">{{$key+1}}.&nbsp;{{$value['name']}}&nbsp;<a href="#" rel="nofollow">{{$value['created_at']}}</a>&nbsp;</p>
                 <p class="comment">
                   {{$value['comment']}}
                 </p>
             </li>
{{--ここまで--}}
          @endforeach
        </div>
        <div class="form-area">
            <form id="form" method="post" action="{{route('update')}}" class="form-comment" enctype="multipart/form-data">
              @csrf
              <p class="title">コメントを投稿する</p>
              <div class="textarea mb10">
                <textarea id="textarea" name="comment" placeholder="コメントを書く"></textarea>
              </div>
              <div class="form-checks">
                <div id="inputName" show="on" class="input-name">
                  <input type="text" name="name" placeholder="名前を入力"/>
                </div>
              </div>

              <input type="hidden" name="favorite_id" value="{{$item['id']}}">
              <input type="hidden" name="link" value="{{$item['link']}}">
              <input type="hidden" name="title" value="{{$item['title']}}">

              <input id="submit" type="submit" value="コメントを投稿" class="btn btn-positive large"/>
              {{--<div id="modalUrl" class="modal-bk">

              </div>--}}
            </form>
          </div>
      </div>

{{---------------------------------------------------------------------------------------------------------------}}
      <div class="tablet-sub tablet-sub-list">
        {{--<a href="/topics/make_topic/" class="btn btn-entry-topic mb20"><span class="icon-plus"></span>トピックを投稿する</a>--}}
          <div class="topic-wrap">
            <div class="topic-list-wrap">
              <h2 class="rank"><a href="/topics/weekly/" class="head-link">人気トピック</a><a href="/topics/weekly/" class="show-more">続きを見る<span class="icon-arrow_r"></span></a>
              </h2>

              <ul class="topic-list">
	                <li class="flc"><a href="/topics/2645216/">
                    <img data-src="https://up.gc-img.net/post_img_web/2020/03/ZvWPa1gc2BR7oe2_4290_s.jpeg" width="60" height="60" class="img lazyload"/>
                    <noscript><img src="https://up.gc-img.net/post_img_web/2020/03/ZvWPa1gc2BR7oe2_4290_s.jpeg"/></noscript>
                    <div class="info">
                      <div class="tag-wrap rank1"><span class="icon-tag"></span>
                        <p class="rank">1<span>位</span></p>
                      </div>
                      <p class="comment"><span class="icon-comment"></span><span></span><span class="datetime"></span></p>
                    </div>
                    <p class="title">{{$item['title']}}</p></a>
                  </li>
              </ul>

            {{--<h2 class="rank"><a href="{{$item['link']}}" class="head-link">人気のキーワード</a><a href="{{route('like')}}" class="show-more">続きを見る<span class="icon-arrow_r"></span></a>
            </h2>

            <ul class="keywords flc">
                <li><a href="/topics/keyword/結婚/"># 結婚</a></li>
                <li><a href="/topics/keyword/イケメン/"># イケメン</a></li>
                <li><a href="/topics/keyword/彼氏/"># 彼氏</a></li>
                <li><a href="/topics/keyword/コスメ/"># コスメ</a></li>
                <li><a href="/topics/keyword/メイク/"># メイク</a></li>
                <li><a href="/topics/keyword/貯金/"># 貯金</a></li>
                <li><a href="/topics/keyword/妊娠/"># 妊娠</a></li>
                <li><a href="/topics/keyword/婚活/"># 婚活</a></li>
                <li><a href="/topics/keyword/美人/"># 美人</a></li>
                <li><a href="/topics/keyword/ダイエット/"># ダイエット</a></li>
                <li><a href="/topics/keyword/恋愛/"># 恋愛</a></li>
            </ul>

            <h2 class="rank"><a href="/topics/category/" class="head-link">カテゴリー</a></h2>
              <ul class="category">
                <li><a href="/topics/category/love/">恋愛・結婚</a></li>
                <li><a href="/topics/category/cosme/">美容・コスメ</a></li>
                <li><a href="/topics/category/fashion/">ファッション</a></li>
                <li><a href="/topics/category/hair/">髪型</a></li>
                <li><a href="/topics/category/otona/">大人</a></li>
                <li><a href="/topics/category/gossip/">芸能人</a></li>
                <li><a href="/topics/category/cook/">料理・食べ物</a></li>
                <li><a href="/topics/category/diet/">ダイエット</a></li>
                <li><a href="/topics/category/family/">家族・子育て</a></li>
                <li><a href="/topics/category/health/">医療・健康</a></li>
                <li><a href="/topics/category/life/">生活</a></li>
                <li><a href="/topics/category/work/">仕事</a></li>
                <li><a href="/topics/category/realtime/">実況</a></li>
                <li><a href="/topics/category/tv/">テレビ・CM</a></li>
                <li><a href="/topics/category/movie/">ドラマ・映画</a></li>
                <li><a href="/topics/category/comic/">マンガ・アニメ・本</a></li>
                <li><a href="/topics/category/music/">音楽</a></li>
                <li><a href="/topics/category/images/">画像</a></li>
                <li><a href="/topics/category/news/">ニュース</a></li>
                <li><a href="/topics/category/politics/">政治・経済</a></li>
                <li><a href="/topics/category/sports/">スポーツ</a></li>
                <li><a href="/topics/category/tech/">IT・インターネット</a></li>
                <li><a href="/topics/category/animal/">犬・猫・動物</a></li>
                <li><a href="/topics/category/talk/">質問・雑談</a></li>
              </ul>--}}

            </div>
        </div>
      </div>
  </div>

  <div class="sub">
    {{--<a href="/topics/make_topic/" class="btn btn-entry-topic mb20"><span class="icon-plus"></span>トピックを投稿する</a>--}}

    <div class="sub-part sub-topics mb20">
      <p class="head"><a href="{{route('like')}}" class="head-link">人気トピック</a></p>
      <ul>
          <li class="flc">
            <a href="{{$topic['link']}}">
            {{--<div class="img">
              <img class="lazyload" data-src="https://up.gc-img.net/post_img_web/2020/03/ZvWPa1gc2BR7oe2_4290_s.jpeg" width="60" height="60"/>
              <noscript><img src="https://up.gc-img.net/post_img_web/2020/03/ZvWPa1gc2BR7oe2_4290_s.jpeg"/></noscript>
              <div class="icon-flag rank1"></div>
              <p class="rank">1</p>
            </div>--}}
            <div class="info">
              <p class="title">{{$topic['title']}}</p>
              {{--<p class="comment"><span class="icon-comment"></span>27143コメント</p>--}}
            </div>
          </a>
          </li>
        </ul><a href="{{route('like')}}" class="show-more">続きを見る<span class="icon-arrow_r"></span></a>
      </div>

      {{--<div class="sub-part sub-keywords mb20">
      <p class="head"><a href="/topics/keyword/" class="head-link">人気のキーワード</a></p>
      <ul class="flc">
            <li><a href="/topics/keyword/結婚/"># 結婚</a></li>
            <li><a href="/topics/keyword/イケメン/"># イケメン</a></li>
            <li><a href="/topics/keyword/彼氏/"># 彼氏</a></li>
            <li><a href="/topics/keyword/コスメ/"># コスメ</a></li>
            <li><a href="/topics/keyword/メイク/"># メイク</a></li>
            <li><a href="/topics/keyword/貯金/"># 貯金</a></li>
            <li><a href="/topics/keyword/妊娠/"># 妊娠</a></li>
            <li><a href="/topics/keyword/婚活/"># 婚活</a></li>
            <li><a href="/topics/keyword/美人/"># 美人</a></li>
            <li><a href="/topics/keyword/ダイエット/"># ダイエット</a></li>
            <li><a href="/topics/keyword/恋愛/"># 恋愛</a></li>
      </ul>
      <a href="/topics/keyword/" class="show-more">続きを見る<span class="icon-arrow_r"></span></a>
    </div>

    <div class="sub-part sub-categories mb20">
      <p class="head"><a href="/topics/category/" class="head-link">カテゴリー</a></p>
      <ul>
        <a href="/topics/category/love/"><li>恋愛・結婚</li></a>
        <a href="/topics/category/cosme/"><li>美容・コスメ</li></a>
        <a href="/topics/category/fashion/"><li>ファッション</li></a>
        <a href="/topics/category/hair/"><li>髪型</li></a>
        <a href="/topics/category/otona/"><li>大人</li></a>
        <a href="/topics/category/gossip/"><li>芸能人</li></a>
        <a href="/topics/category/cook/"><li>料理・食べ物</li></a>
        <a href="/topics/category/diet/"><li>ダイエット</li></a>
        <a href="/topics/category/family/"><li>家族・子育て</li></a>
        <a href="/topics/category/health/"><li>医療・健康</li></a>
        <a href="/topics/category/life/"><li>生活</li></a>
        <a href="/topics/category/work/"><li>仕事</li></a>
        <a href="/topics/category/realtime/"><li>実況</li></a>
        <a href="/topics/category/tv/"><li>テレビ・CM</li></a>
        <a href="/topics/category/movie/"><li>ドラマ・映画</li></a>
        <a href="/topics/category/comic/"><li>マンガ・アニメ・本</li></a>
        <a href="/topics/category/music/"><li>音楽</li></a>
        <a href="/topics/category/images/"><li>画像</li></a>
        <a href="/topics/category/news/"><li>ニュース</li></a>
        <a href="/topics/category/politics/"><li>政治・経済</li></a>
        <a href="/topics/category/sports/"><li>スポーツ</li></a>
        <a href="#"><li>IT・インターネット</li></a>
        <a href="/topics/category/animal/"><li>犬・猫・動物</li></a>
        <a href="/topics/category/talk/"><li>質問・雑談</li></a>
      </ul>
    </div>--}}
  </div>
</div>
@endsection
