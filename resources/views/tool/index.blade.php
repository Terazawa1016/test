<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title>商品管理ページ</title>
    <link href="{{ asset('css/tool.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tool_small.css') }}" rel="stylesheet">

</head>
<body>
    <h1>管理ページ</h1>
    <div>
      <form method="post" action="{{route('logout')}}">
        @csrf
        <input class="nemu btn btn-secondary" type="submit" value="ログアウト">
      </form>
        <a href="{{route('user.manage')}}">ユーザ管理ページ</a>
        <a href="{{route('tool.create')}}">商品新規追加</a>
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

        <h2>商品情報の一覧・変更</h2>
        <table>
            <tr>
                <th>商品画像</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫数</th>
                <th>ステータス</th>
                <th>操作</th>
            </tr>
            @if (!empty($item))
            @foreach ($item->all() as $item)
            <tr class="status_false">
            <!--テーブル内表示-->
            <!--三項演算子『？』で条件分岐、指定の文字が入っているか空か-->
            <tr class = "{{(!$item->status) ? 'status_false':''}}">
                <td><img class="img_size" src = "/storage/images/{{$item -> img_name}}"></td>
                <td class="name_width">{{$item->name}}</td>
                <td class="text_align_right">{{$item->price}}</td>
                <td>
                    <!--在庫数変更-->
                    <form method = "post" action="{{route('tool.update',['item_id' => $item->id])}}">
                      @csrf
                        <input type = "text" class="input_text_width text_align_right" name = "stock" value = "{{$item->itemStock->stock}}">個
                        <input type = "submit" value = "変更">
                    </form>
                </td>
                <td>
                    <!--ステータス変更-->
                    <form method = "post" action="{{route('tool.status', ['item_id' => $item->id])}}">

                      @csrf
                        @if ($item->status === 0)
                            <input type = "submit" name ="status_button" value = "非公開→公開">
                            <!--非公開『0』を選択で背景色グレーに変更-->
                            <input type = "hidden" name = "status" value = '1' >
                        @else
                            <input type = "submit" name ="status_button" value = "公開→非公開">
                            <input type = "hidden" name = "status" value = '0' >
                        @endif
                    </form>
                </td>
                <td>
                    <!--削除-->
                    <form method = "post" action="{{route('tool.delete',['item_id' => $item->id])}}">
                      @csrf
                        <input type = "submit" value = "削除">
                    </form>
                </td>
            </tr>
            </tr>
            @endforeach
            @endif
        </table>
    </section>
</body>
</html>
