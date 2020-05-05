@extends('layouts.contentapp')

@section('content')
  <div class="content">
    <div class="main">
    <nav class="nav">
      <div class="sticky">
     </div>
   </nav>

    {{--エラー表示--}}
    @if ($errors->any())
      <p>
        @foreach ($errors->all() as $err)
        {{$err}}<br>
        @endforeach
      </p>
    @endif
    <ul class="item-list">
      <li>
        <div class="item">
        </div>
      </li>
     </ul>
   </div>
 </div>

@endsection
