<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Auth;
use Telegram as Telegram;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function username() {
        $identity  = request()->get('username');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldName => $identity]);
        return $fieldName;
    }

    protected function validateLogin(Request $request) {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string'
        ], [
            'username.required' => 'Harap masukkan Username',
            'password.required' => 'Harap masukkan Password'
        ]);
    }

    public function authenticated(Request $request) {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            Telegram::sendMessage([
                'chat_id' => '421428311',
                'text' => 'User '.$user->username.'['.strtoupper($user->name).'] is Logged In'
            ]);
            return redirect()->intended('dashboard');
        }        
    }

    protected function sendFailedLoginResponse(Request $request) {
        $request->session()->put('login_error', trans('auth.failed'));
        throw ValidationException::withMessages([
            'error' => [trans('auth.failed')],
        ]);
    }

}
