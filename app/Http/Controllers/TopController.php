<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FeedReader;
use App\Favorite;

class TopController extends Controller
{
  public function index(Request $request, $page=1)
  {
    $feed = FeedReader::read('https://news.yahoo.co.jp/byline/rss/all.xml');

    if ( $feed->error() ) {
        echo $feed->error();
    }

// 検索があったらlikeのテーブル情報で検索し、表示する
    if($request->has('s')) {

      $hash = Favorite::latest();

      $hash = $hash->where('title','LIKE', "%$request->s%")->paginate(10);
      return view('top.like',compact('hash', 'topic'));
    }

    $limit = ($page) * 10;

    $hash = [];
    foreach ($feed->get_items() as $key=>$item) {

      // if($key >= $limit && $limit +10 >= $key){
          $content = $item->get_content();
            $hash[] = [
              'site_title' => $item->get_feed()->get_title(),
              'title' => trim($item->get_title()),
              'permalink' => trim($item->get_permalink()),
              'link' => trim($item->get_link()),
              'date' => $item->get_date('Y-m-d H:i:s'),
              'content' => $content,
              'img' => $this->get_first_image_url($content),
            ];
      // }

    }
    $hash = collect($hash);


    $pagenate_count = ($hash->count()/10);

    $hash = $hash->take($limit)->take(-10)->toArray();

    if(isset($request->s)){
      foreach ($hash as $key=>$value){
        if(strpos($value['title'],$request->s) === false){

  //'abcd'のなかに'bc'が含まれていない場合
        unset($hash[$key]);
        }
      }
    }

    array_values($hash);

    $topic = Favorite::orderBy('count','desc')->first();

    return view('top.index',compact('hash', 'topic', 'pagenate_count'));
  }

  public function like(Request $request)
  {
    $hash = Favorite::latest();
    $topic = Favorite::orderBy('count','desc')->first();

// hashで取得したデータを検索があった場合に絞り込む
    if($request->has('s')) {
      $hash = $hash->where('title','LIKE', "%$request->s%")->paginate(10);
    } else {
      $hash = $hash->paginate(10);
    }

    return view('top.like',compact('hash', 'topic'));
  }

//アイコンクリックでDB保存の処理
  public function favorite(Request $request){

    $input = $request->all();

    unset($input['_token']);
    $favorite =  Favorite::where('link', $input['link'])->first();
    if($favorite) {

      $favorite->count += 1;
      $favorite->save();
    } else {
      $favorite = new Favorite;

      $favorite->fill($input);
      $favorite->count = 1;
      $favorite->save();

    }

    return redirect('/like');
  }

  public function favorites(Request $request){

    $input = $request->all();

    unset($input['_token']);
    $favorite =  Favorite::where('link', $input['link'])->first();
    if($favorite) {

      $favorite->count += 1;
      $favorite->save();
    } else {
      $favorite = new Favorite;

      $favorite->fill($input);
      $favorite->count = 1;
      $favorite->save();

    }

    return redirect('top');
  }

// 一番人気記事一覧取得
  public function pref(Request $request)
  {
    // $input = $request->all();
    // unset($input['_token']);
    $hash = Favorite::orderBy('count', 'desc')->paginate(10);;
    $topic = Favorite::latest()->first();

    return view('top.pref',compact('hash', 'topic'));

  }

  function get_first_image_url($content)
  {
        {
        if (preg_match('/<img.+?src="(.+?)"/', $content, $matches))
          {
          return $matches[1];
          }
           else echo '';
        }

  }

}
