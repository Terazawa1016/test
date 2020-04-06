@extends('layouts.folio')

@section('content')
    <div class="content-main">
        <div class="content-inner">

            <nav class="nav" id="cl">
                <div class="nav-main">
                    <ul class="left">
                         <li><a href="#" target="_blank">all</a></li>
                         <li><a href="#" target="_blank">identity</a></li>
                         <li><a href="#" target="_blank">graphic</a></li>
                         <li><a href="#" target="_blank">editorial</a></li>
                         <li><a href="#" target="_blank">other</a></li>
                    </ul>
                </div>

            </nav>
            <article class="article">
                <section class="article-middle">
                    <h2 class="radius">
                      EC site
                    </h2>
                    <div class="article-img">
                        <a href="{{route('home')}}"><img src="/storage/images/ec.jpg"></a>
                    </div>

                </section>
                <section class="article-bottom">
                    <h2 class="radius">
                        NEWS & CHAT
                    </h2>
                    <div class="article-img">
                          <a href="{{route('top')}}"><img src="/storage/images/news.jpg"></a>
                    </div>
                    <div class="article-img">
                          <a href="{{route('like')}}"><img src="/storage/images/chat.jpg"></a>
                    </div>
                </section>
        </article>
    </div>
  </div>
  @endsection
