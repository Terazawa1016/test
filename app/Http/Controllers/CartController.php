<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use GuzzleHttp\Client;
use App\Item;
use App\ItemManage;
use App\ItemStock;
use App\Cart;
use App\User;
use Auth;

class CartController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function index()
  {
    $user=Auth::user();
    $items = Cart::where('user_id',$user->id)->get();

    // $client = new \GuzzleHttp\Client();
    // $res = $client->request('POST', 'https://api.sandbox.paypal.com/v1/oauth2/token', [
    //   'form_params' => [
    //    'grant_type' => 'client_credentials'
    //   ],
    //    'auth' => [
    //      'AThh_KGgAVaWBMCU4MRNG7ZrkD2SKQhbez_RDFYx_PkIlh-qIcWp0k4IijJqQEmDU_seSWqdKw7l3OYI',
    //      'EN3qlmgZeEZTILdS8C5x-Ka-T91A1iuKXTaxjHrip5ZJiL96LqxgnHIYjyWUozwll1OICbGh8xkBOhi-'
    //    ],
    //     'headers' => [
    //       'Content-Type' => 'application/json',
    //       'Accept-Language' => 'en_US'

    //     ]
    // ]);

    // $json = json_decode($res->getBody(), true);


// dd($items[0]);
    return view('/cart.index', compact('items','user'));
  }

  public function delete(Request $request, $item_id)
  {

    Cart::where('id', $item_id)
    ->delete();

    return redirect('/cart');
  }

  public function change(CartRequest $request, $item_id)
  {

    $input = $request->all();
    unset($input['_token']);

    $item = Cart::where('id', $item_id)->first();

    //値を部分的に更新

// dd($input);
    $item->fill($input);
    $item->save();

    return redirect('/cart');
  }

  public function finish()
  {
    $user = Auth::user();
    $items = Cart::where('user_id', $user->id)->get();
    Cart::where('user_id', $user->id)->delete();

//商品が買われた数を保存
 foreach ($items as $item){
   $item_manage = ItemManage::where(['item_id'=>$item->item_id])->first();
   if ($item_manage) {
     $item_manage['buy_item'] += $item['amount'];
   } else {
     $item_manage = new ItemManage;
     $item_manage['buy_item'] = $item['amount'];
     $item_manage['item_id'] = $item['item_id'];
   }
   $item_manage->save();
 }

// dd($items[0]);
    return view('/cart.finish', compact('items'));
  }

  public function api_delete($user_id)
  {

    Cart::where('user_id', $user_id)
    ->delete();

    return true;
  }


}
