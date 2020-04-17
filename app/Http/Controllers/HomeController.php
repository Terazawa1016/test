<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Item;
use App\ItemStock;
use App\Cart;
use App\User;
use App\Like;
use App\ItemManage;
use Auth;

use App\Services\CheckExtensionServices;
use App\Services\FileUploadServices;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
      // \DB::enableQueryLog();
  //指定した条件のみ取得をget()で行う
      $item = Item::where('status', 1);

// 検索した名前に部分一致する商品情報を取得する
      if($request->has('s')) {
        $item = $item->where('name', 'like', "%{$request->s}%");
      }

// 「いいね」数カウント
      $count_favorite = User::find(Auth::id())->likes()->count();

// 更新順に取得
      if($request->has('new_id')) {

        $item = $item->orderBy('updated_at', 'desc');
       }

// item_manageから売れ筋を取得
      if($request->has('best_id')) {

        // whereHasでリレーション先でクエリを実行
        $item = $item->whereHas('item_manage', function($query) {
          $query->orderBy('buy_item','desc');
        });
      }

// お気に入り商品情報取得
      if($request->has('tab_id')) {

        $item = $item->whereHas('like', function($query) {
          $query->where('user_id', Auth::id());

        });
       }


// カテゴリー一覧
    if($request->has('category')) {

      $item = $item->where([
        'category'=>$request->category
      ]);
    }

// 最後にここでデータをgetする
    $items = $item->paginate(5);

      return view('/home', compact('items','count_favorite'));
    }

    public function click(Request $request, $item_id)
    {
      $input = $request->all();
      $input['user_id'] = Auth::id();
      $input['item_id'] = $item_id;
      unset($input['_token']);

      $item = new Cart;
      $cart_data = $item->where([
        'user_id'=>$input['user_id'],
         'item_id'=>$input['item_id']
       ])->first();

//検索結果があったら
      if (!empty($cart_data)) {
        $cart_data->amount = $cart_data->amount + 1;
        $data=$cart_data;
//nullだったら
      } else {
        $item->amount = 1;
        $item->user_id = $input['user_id'];
        $item->item_id = $input['item_id'];
        $data=$item;
      }

      // データベースに登録
      // $item->fill($data);
      //save()はidの情報があったらupdate
      //なかったらinsert
      $data->save();

      return redirect('/cart');
    }

    public function put(Request $request, $item_id)
    {
      $input = $request->all();
      $input['user_id'] = Auth::id();
      $input['item_id'] = $item_id;
      unset($input['_token']);

      $item = new Cart;
      $cart_data = $item->where([
        'user_id'=>$input['user_id'],
         'item_id'=>$input['item_id']
       ])->first();

//検索結果があったら
      if (!empty($cart_data)) {
        $cart_data->amount = $cart_data->amount + 1;
        $data=$cart_data;
//nullだったら
      } else {
        $item->amount = 1;
        $item->user_id = $input['user_id'];
        $item->item_id = $input['item_id'];
        $data=$item;
      }

      // データベースに登録
      // $item->fill($data);
      //save()はidの情報があったらupdate
      //なかったらinsert
      $data->save();

      return redirect('/cart');
    }

    public function rank(Request $request)
    {
      $count_favorite = User::find(Auth::id())->likes()->count();

      $item = Item::where('status', 1);

        // whereHasでリレーション先でクエリを実行
        $item = $item->whereHas('item_manage', function($query) {
          $query->orderBy('buy_item','desc');
        });

      // 最後にここでデータをgetする
      $items = $item->paginate(5);

      return view('/rank', compact('items','count_favorite'));


    }

}
