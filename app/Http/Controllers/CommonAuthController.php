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
                return redirect()->route('home');
            }
            return redirect()->route('home');
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
                        return redirect()->route('home');
                    }
                    return redirect()->route('home');
                    
                }
            }else{
                $createUser = User::where('email',$user->email);
                if($createUser){
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
                        return redirect()->route('home');
                    }
                    return redirect()->route('home');
                    
                }
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        
        return Socialite::driver('google')->redirect();
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {
      
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->id)->first();
            if($finduser){
       
                Auth::login($finduser);
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
                        return redirect()->route('home');
                    }
                    return redirect()->route('home');
                    
                }
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'phone' => NULL,
                    'email' => $user->email,
                    'profile_photo' => $user->avatar_original,
                    'google_id' => $user->id,
                    'user_type' => 6, //Normal User
                    'password' => encrypt('realesteate@123')
                ]);
                
                Auth::login($newUser);
      
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
                    return redirect()->route('home');
                }
                return redirect()->route('home');
                
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
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
