<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FolioController extends Controller
{
  public function folio()
  {
    return view('folio.index');
  }
}
