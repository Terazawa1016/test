@extends('layouts.top')

@section('content')

    <div class="wrap flc">

      <div class="main">
        <div class="entry-wrap">
          <!-- <h1>トピックを投稿する</h1><img src="/img/parts_pc/step1.png" srcset="/img/parts_pc/step1.png 1x,/img/parts_pc/step1@2x.png 2x" width="641" class="step"> -->

          <form id="form" action="" method="post" enctype="multipart/form-data" class="form form-topic">
            <div class="flc">
              <div class="image">
                <div class="form-images">
                  <div id="topicThum" class="img"></div>
                  <div class="add-image">
                    <div class="wrap"><span class="icon-camera"></span>
                      <p class="text normal">画像を選択</p>
                      <p class="text error">選びなおす</p>
                      <input id="addImage" type="file" name="add_pic"/>
                    </div>
                    <p id="addImageCaution" class="caution hidden">選択できる画像は5MBまでです</p>
                  </div>
                </div>
              </div>
              <div class="other">
                <div class="form-head flc">
                  <input id="title" type="text" name="title" placeholder="タイトルを書く" value="" class="input-title"/>
                  <div class="textarea mb10">
                    <textarea id="textarea" name="text" placeholder="本文を書く"></textarea>
                    <p id="btnUrl" class="add-link"><span class="icon-link"></span>記事・画像を引用</p>
                  </div>
                  <div class="form-checks">
                    <div id="inputName" show="off" class="input-name">
                      <input type="text" name="name" placeholder="名前を入力" value=""/>
                    </div>
                    <input id="anonymous" type="checkbox" name="anonymous" value="匿名で投稿" checked="checked"/>
                    <label for="anonymous" class="checkbox">匿名で投稿</label>
                    <input id="showId" type="checkbox" name="id_show_flag" value="1"/>
                    <label for="showId" class="checkbox">IDを表示してなりすまし防止</label>
                  </div>
                </div>
              </div>
            </div>
            <input type="hidden" name="is_next" value="0"/>
            <input type="hidden" name="is_post" value="1"/>
            <input id="submit" type="submit" value="トピックを投稿する" disabled="disabled" class="btn btn-positive"/>
            <div id="modalUrl" class="modal-bk">
              <div class="modal-wrap modal-url">
                <p class="title">記事または画像を引用する</p>
                <p class="desc">URLを挿入すると実際の本文にはこのように表示されます。</p><img src="/img/parts_pc/image_sample.png" width="100%"/>
                <div id="inputUrls" class="input-urls">
                  <input type="url" placeholder="URLを入力"/>
                </div>
                <div id="addUrl" class="add-url"><span class="icon-plus"></span><span>URLを追加</span></div>
                <div id="insertUrl" class="btn btn-positive">URLを挿入</div>
                <p class="close js-close"><span class="icon-close"></span></p>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="sub responsive">
        <div class="sub-part sub-text sub-text-aet mb20">
          <p class="head">トピックの承認制について</p>
          <p class="text">毎日投稿いただくトピックの数が非常に多いため、下記のような基準による承認制としております。</p>
          <p class="subtitle"><span class="icon-circle"></span>承認されやすい話題</p>
          <p class="text">・多くの女性が興味を持ちそうな話題<br>・コメントしやすそうな話題<br>・読んで面白くなりそうな話題</p>
          <p class="subtitle"><span class="icon-triangle"></span>非承認の可能性が高い話題</p>
          <p class="text">・個人的な悩み相談、質問<br>・単なる悪口ばかりになりそうな話題<br>・理解できる人が少なそうな話題<br>・男性目線で性的な話題<br>・意図がわかりにくい話題<br>・既に類似トピックが存在する話題</p>
        </div>
        <div class="sub-part sub-text sub-text-eh">
          <p class="head">トピック投稿のヒント</p>
          <p class="subtitle"><span>1</span>わかりやすいタイトル</p>
          <p class="text">トピックの内容をイメージしやすいタイトルを心がけてください。</p>
          <p class="subtitle"><span>2</span>トピックに合った画像</p>
          <p class="text">画像をアップロードするか、画像のURLを本文に入力してください。その画像がトピックのトップ画像（サムネイル）として表示されます。</p>
          <p class="subtitle"><span>3</span>本文で具体的に</p>
          <p class="text">多くの人がコメントしやすいよう、具体的に本文を記入しましょう。</p>
        </div>
      </div>
    </div>
@endsection
