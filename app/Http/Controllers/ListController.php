<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use FeedReader;
use App\User;
use App\Like;
use Auth;

class ListController extends Controller
{
  public function index(){

    $feed = FeedReader::read('https://books.rakuten.co.jp/RBOOKS/xml/rss/000/999/000/rss.xml');

    if ( $feed->error() ) {
        echo $feed->error();
    }

    $hash = [];
    foreach ($feed->get_items() as $key=>$item) {

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
    }

    if(isset($request->s)){
      foreach ($hash as $key=>$value){
        if(strpos($value['title'],$request->s) === false){

  //'abcd'のなかに'bc'が含まれていない場合
        unset($hash[$key]);
        }
      }
    }

    array_values($hash);

      return view('list.list', compact('hash'));
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
