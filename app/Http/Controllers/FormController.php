<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Form;
use App\User;
use Auth;
use App\Events\PusherEvent;
use App\Mail\TestMail;
use Mail;

class FormController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
  }

  public function form()
  {
    return view('/form');
  }

  public function receive(ContactRequest $request)
  {
    $input = $request->all();
    $input['user_id'] = Auth::id();
    unset($input['_token']);

    $form = new Form;
    $form_data = $form->fill($input);

    $forms = $form_data;

    // dd($forms);

    Mail::to('test@example.com')
    ->send(new TestMail($forms));

    //pusherの処理
    // event(new PusherEvent($form_data));
    $forms->save();


     return redirect('/form')->with('flash_message', '送信が完了しました');

  }
}
