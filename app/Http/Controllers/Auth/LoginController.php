<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers{
      login as protected parent_login;
      logout as protected parent_logout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
      if ($request->email === 'admin' && $request->password === 'admin') {
        $user = new User;
        // adminユーザ特定
        $admin = $user->where('email', $request->email)->first();

        Auth::guard('admin')->login($admin, true);
        return redirect('/tool');
      }
      //管理者ログインを実行
      //Laravelのデフォルトログインを実行
      return $this->parent_login($request);
    }

    public function logout(Request $request)
    {
      $this->parent_logout($request);
      return redirect('/login');
    }
}
