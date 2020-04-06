<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>ユーザ管理ページ</title>
  <link href="{{ asset('css/tool.css') }}" rel="stylesheet">
</head>
<body>
  <h1>管理ページ</h1>
  <div>
    <form method="post" action="{{route('logout')}}">
      @csrf
      <input class="nemu btn btn-secondary" type="submit" value="ログアウト">
    </form>
    <a href="{{route('tool')}}">商品管理ページ</a>
  </div>

  {{--エラー表示--}}
  @if ($errors->any())
    <p>
      @foreach ($errors->all() as $err)
      {{$err}}<br>
      @endforeach
    </p>
  @endif

  <h2>ユーザ情報一覧</h2>
    <table>
        <tr>
            <th>ユーザID</th>
            <th>登録日</th>
        </tr>
        @foreach ($user->all() as $user)
        <tr>
            <td class="name_width">{{$user->name}}</td>
            <td>{{$user->created_at}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
