<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index()
  {
    $user = User::all();

    // 取得したデータをviewに送る
    return view('user.index', compact('user'));
  }
}
