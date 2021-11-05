<?php

namespace App\Http\Controllers;

use App\User;
use Exception;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class CommonAuthController extends Controller
{
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
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookSignin()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            dd($user);
            $facebookId = User::where('facebook_id', $user->id)->first();
            if($facebookId){
                Auth::login($facebookId);
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
            }else{
                $createUser = User::where('email',$user->email);
                if($createUser){
                    $createUser->name = $user->name;
                    $createUser->email = $user->email;
                    $createUser->facebook_id = $user->id;
                    $createUser->name = $user->name;
                    $createUser->update();

                }else{
                    $createUser = User::create([
                        'name' => $user->name,
                        'email' => $user->email,
                        'facebook_id' => $user->id,
                        'user_type' => config('const.User'),
                        'password' => encrypt('realesteate@123')
                    ]); 
                }
    
                Auth::login($createUser);
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
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
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
