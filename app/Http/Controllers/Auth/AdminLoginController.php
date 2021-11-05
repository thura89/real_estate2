<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
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
    protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin_user')->except('logout');
    }

    /**
     * Show the application's Admin login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            if (auth()->user()->user_type == 1) {
                return redirect()->route('admin.property.index');
            }
            /* Admin Staff */
            if (auth()->user()->user_type == 2) {
                return redirect()->route('admin.property.index');
            }
            /* Admin Editor */
            if (auth()->user()->user_type == 3) {
                return redirect()->route('admin.property.index');
            }
            /* Agent */
            if (auth()->user()->user_type == 4) {
                return redirect()->route('agent.property.index');
            }
            /* Developer */
            if (auth()->user()->user_type == 5) {
                return redirect()->route('developer.property.index');
            }
            /* User */
            if (auth()->user()->user_type == 6) {
                return redirect()->route('user.home');
            }
        }
        return view('auth.common_login');
    }

    /**
     * Get the Admin guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('admin_user');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        $user->ip = $request->ip();
        $user->user_agent = $request->server('HTTP_USER_AGENT');
        $user->login_at = date('Y-m-d H:i:s');
        $user->update();
        return redirect($this->redirectTo);
    }
}
