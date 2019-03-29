<?php

namespace App\Http\Controllers\Auth;
use Carbon\Carbon ;

use Illuminate\Http\Request;
use App\AuthenticationLogs;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;


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
    protected $redirectTo = '/users';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    function authenticated(Request $request,$user)
    {
        $userLogin=auth()->id();
        $user->find($userLogin)->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_logout_at' => date('Y-m-d H:i:s'),
            'login_ip' => $request->getClientIp(),
            'http_user_agent' => $request->server('HTTP_USER_AGENT'),
            ]);
        AuthenticationLogs::insert([
        'user_id'=>auth()->id(),
        'login_time' => Carbon::now()->toDateTimeString(),
        'logout_time' => date('Y-m-d H:i:s'),
        'ip_address' => $request->getClientIp(),
        'browser_agent'=> $request->server('HTTP_USER_AGENT'),
    
        ]);
    }
    function logout()
    {
    AuthenticationLogs::where('user_id',auth()->id())->update([
    'logout_time' => date('Y-m-d H:i:s'),
    ]);
    Auth::logout();
    return redirect('/login');
    }
}
