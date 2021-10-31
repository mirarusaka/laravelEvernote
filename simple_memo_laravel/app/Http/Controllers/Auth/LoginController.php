<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    //ログイン後のリダイレクト先を設定
    protected $redirectTo = '/memo';

    protected function validateLogin(Request $request)
    {
        $request->validate(
            [
                $this->username() => 'required|max:255|email',
                'password' => 'required|min:8|max:255|regex:/^[a-zA-Z0-9]+$/',
            ],
            [
                //:attributeが置き換え対象
                'password.regex' => ':attributeは半⾓英数字で⼊⼒してください。'
            ]
        );
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
