<!DOCTYPE html>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>管理ページ</title>
    <link href="{{ asset('css/tool.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tool_small.css') }}" rel="stylesheet">

</head>
<body>
    <h1>管理ページ</h1>
    <div class ="create_item">
      <form method="post" action="{{route('logout')}}">
        @csrf
        <input class="nemu btn btn-secondary" type="submit" value="ログアウト">
      </form>
        <a href="{{route('user.manage')}}">ユーザ管理ページ</a>
        <a href="{{route('tool')}}">商品管理ページ</a>

    </div>
    <section>

{{--エラー表示--}}
@if ($errors->any())
  <p>
    @foreach ($errors->all() as $err)
    {{$err}}<br>
    @endforeach
  </p>
@endif
        <h2>新規商品追加</h2>
        <form method="post" enctype="multipart/form-data" action="{{route('tool.store')}}">
          @csrf
            <div><label>名前: <input type="text" name="name" value=""></label></div>
            <div><label>値段: <input type="text" name="price" value=""></label></div>
            <div><label>個数: <input type="text" name="stock" value=""></label></div>
            <div><label>商品画像: <input type="file" name="img_name"></div></label>
            <div>
                ステータス:
                <select name="status">
                    <option value="0">非公開</option>
                    <option value="1">公開</option>
                </select>
            </div>
            <div>
              カテゴリー:
              <select name="category">
                <option value="goods">文具</option>
                <option value="fashion">ファッション</option>
                <option value="funiture">家具</option>
                <option value="books">本・雑誌</option>
                <option value="glossary">食品</option>
                <option value="tech">テクノロジー</option>
                <option value="restock">再入荷</option>
                <option value="gift">贈り物</option>
                <option value="sale">セール</option>
                <option value="limited">限定商品</option>
                <option value="other">その他</option>

              </select>
            <div><input type="submit" value="商品を登録する"></div>
        </form>
    </section>
