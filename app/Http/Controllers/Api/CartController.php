<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;


class CartController extends Controller
{
  public function delete($user_id)
  {

    Cart::where('user_id', $user_id)
      ->delete();

    return true;
  }
}
