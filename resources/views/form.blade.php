@extends('layouts.shopapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

          {{--エラー表示--}}
          @if ($errors->any())
            <p>
              @foreach ($errors->all() as $err)
              {{$err}}<br>
              @endforeach
            </p>
          @endif
          {{--フラッシュメッセージ--}}
         @if (session('flash_message'))
             <div class="flash_message">
                 {{ session('flash_message') }}
             </div>
         @endif
         <a href="{{route('home')}}" class="btn-flat-border2">ホームに戻る</a>
            <div class="card">
                <div class="card-header">{{ __('お問い合わせ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('receive') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('名前') }}</label>

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="comment" class="col-md-4 col-form-label text-md-right">{{ __('内容') }}</label>

                            <div class="col-md-6">
                                <textarea name="comment" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('送信') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
