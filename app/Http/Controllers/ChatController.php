<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;
use App\Favorite;

class ChatController extends Controller
{

  public function chat(Request $request)
  {
    $input = $request->all();

    if($request->has('s')) {

      $hash = Favorite::latest();
      $topic = Favorite::latest()->first();
      $hash = $hash->where('title','LIKE', "%$request->s%")->paginate(10);
      return view('top.like',compact('hash', 'topic'));
    }

// 外部キー接続したChatテーブルから同じリンクを取得
    $item = Favorite::where([
      'link'=>$input['link'], 'title'=>$input['title']
    ])->first();

    $topic = Favorite::orderBy('count','desc')->first();
    
    $chat_items = Chat::where([
      'favorite_id'=>$item->id
    ])->get();

    if($item) {
      return view('top.chat', compact('item', 'chat_items', 'topic'));

    } else {
      return redirect('/like');
    }
  }

  public function update(Request $request)
  {
    $input =$request->all();

    unset($input['_token']);
    $chat = new Chat;
    $chat->fill($input);
    $chat->save();

// 外部キー接続したChatテーブルから同じリンクを取得
    $item = Favorite::where([
      'link'=>$input['link']
    ])->first();
    $topic = Favorite::latest()->first();

    $chat_items = Chat::where([
      'favorite_id'=>$item->id
    ])->get();

    if($item) {
      return view('top.chat', compact('item', 'chat_items', 'topic'));

    } else {
      return redirect('/like');
    }

    // return redirect('/chat');
  }

}
