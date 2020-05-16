<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StockRequest;
use App\Http\Requests\ItemRequest;
use App\ItemStock;
use App\Item;
use Intervention\Image\Facades\Image;

use App\Services\CheckExtensionServices;
use App\Services\FileUploadServices;

class ToolController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function index()
  {
    $item = Item::first();

    // 取得したデータをviewに送る
    return view('/tool.index', compact('item'));
  }

  //新規登録画面
  public function create()
  {
    return view('/tool.create');
  }

  //新規登録完了画面
  public function store(ItemRequest $request)
  {
    $input = $request->all();
    $stock_data = ['stock' => $input['stock']];
    unset($input['_token']);
    unset($input['stock']);

    $item = new Item;
    //ファイル保存処理
    if (!is_null($request['img_name'])) {
      $imageFile = $request['img_name'];

      $list = FileUploadServices::fileUpload($imageFile);
      list($extension, $fileNameToStore, $fileData) = $list;

      $data_url = CheckExtensionServices::checkExtension($fileData, $extension);
      $image = Image::make($data_url);
      $image->resize(125, 125)->save(storage_path() . '/app/public/images/' . $fileNameToStore);
      $item->img_name = $fileNameToStore;
    }

    // トランザクション処理
    \DB::transaction(function () use ($input, $item, $stock_data) {

      // データベースに登録
      $item->fill($input);
      $item->save();

      //saveした後の最終データをとってItemStockに保存
      $stock_data['item_id'] = $item->id;

      $item_stock = new ItemStock;
      $item_stock->fill($stock_data);
      $item_stock->save();
    });


    return redirect('/tool');
  }

  //在庫数量変更処理
  public function update(StockRequest $request, $item_id)
  {
    $input = $request->all();
    unset($input['_token']);

    $item = ItemStock::where('item_id', $item_id)
      //カラム全体を更新。渡されたものを全て更新
      ->update($input);

    return redirect('/tool');
  }

  //ステータス変更処理
  public function status(Request $request, $item_id)
  {
    $input = $request->all();
    unset($input['_token']);

    $item = Item::where('id', $item_id)->first();
    //値を部分的に更新
    $item->fill($input);
    $item->save();

    return redirect('/tool');
  }

  //削除処理
  public function delete(Request $request, $item_id)
  {
    Item::where('id', $item_id)
      ->delete();

    return redirect('/tool');
  }
}
