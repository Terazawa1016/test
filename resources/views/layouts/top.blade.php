<!DOCTYPE HTML>
<html>
  <head lang="ja">
    <title>NEWS</title>
<!-- logly_noindex -->

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- フォントアウェイサム -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" crossorigin="anonymous">

  </head>

<body>
    <header>
      <div class="title"><a href="#"><img src="/storage/images/test_logo2.png" width="400" height="100" alt="TEST SHOP"></a></div>
    </header>

    <nav>
      <div class="header-nav flc">
        <div class="catch"><a href="{{route('top')}}">「いいね」をして話題でチャット</a></div>
        <form action=""id="form4" action="" method="get">
          <div class="search">
            <div class="icon-search ">
                <input id="sbox4"  id="s" name="s" type="text" placeholder="チャットできるトピックを探す" />
                <button id="sbtn4" type="submit"><i class="fas fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </nav>

{{--コンテンツ--------------------------------------------------------------}}

@yield('content')

<div class="footer">
      <div class="footer-logo"><a href="/"><img src="/storage/images/test_logo3.png" width="200" height="50"></a></div>
      <div class="links flc"><a href="https://jsquared.co.jp/" target="_blank">運営会社</a><a href="/contact.html">お問い合わせ</a><a href="/help/">よくある質問</a><a href="/agreement.html">利用規約</a></div>
</div>
    <div id="scrollToTop" class="scroll-to-top"><span class="icon-arrow_t"></span></div>

<style type="text/css">
      body > a {
      	display:none;
      }
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



<script type="text/javascript">
$(document).ready(function() {
    $('.like_btn').click(function() {
      //自分自身の親要素(フォーム)を参照する
      //サブミットを実行
        $(this).parent().submit();
    });
});

$(document).ready(function() {
    $('.article_btn').click(function() {
      //自分自身の親要素(フォーム)を参照する
      //サブミットを実行
        $(this).parent().submit();
    });
});

</script>

</body>
</html>
