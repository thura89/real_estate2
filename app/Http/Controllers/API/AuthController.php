<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Helpers\SMS;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'company_name' => 'required',
            'user_type' => 'required|in:4,5,6',
            'agent_type' => 'required_if:user_type,==,4',
            'address' => 'required',
            'profile_photo' => 'required|mimes:jpeg,bmp,png,jpg',
            'cover_photo' => 'required|mimes:jpeg,bmp,png,jpg',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:6|max:11|unique:users,phone',
            'password' => 'required|min:6|max:20',
        ]);

        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request',$validate->errors());
        }
        $user = new User();
        if ($request->hasFile('profile_photo')) {
            $profile_img = $request->file('profile_photo');
            $profile_img_name = uniqid().'_'.time().'.'.$profile_img->extension();
            Storage::disk('public')->put('/profile/'.$profile_img_name, file_get_contents($profile_img));
        }
        if ($request->hasFile('cover_photo')) {
            $cover_img = $request->file('cover_photo');
            $cover_img_name = uniqid().'_'.time().'.'.$cover_img->extension();
            Storage::disk('public')->put('/cover/'.$cover_img_name, file_get_contents($cover_img));
        }
        $user->user_type = $request->user_type;
        $user->company_name = $request->company_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->user_type == 4) {
            $user->agent_type = $request->agent_type;
        }
        $user->address = $request->address;
        $user->description = $request->description;
        $user->profile_photo = $profile_img_name;
        $user->cover_photo = $cover_img_name;
        $user->password = Hash::make($request->password);
        $user->ip = $request->ip();
        $user->user_agent = $request->server('HTTP_USER_AGENT');
        $user->login_at = date('Y-m-d H:i:s');
        $user->save();

        $token = $user->createToken('Real Estate')->accessToken;

        return ResponseHelper::success('Successfully Create User',$token);

    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if( Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = auth()->user();
            $token = $user->createToken('Real Estate')->accessToken;
            return ResponseHelper::success('Successfully Login',$token);
        }
        return ResponseHelper::fail('Fail Login',null);
    }

    public function changePassword(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request',$validate->errors());
        }

        $user =  User::findOrFail(auth()->user()->id);
        

        $user->password = Hash::make($request->password);
        $user->update();

        auth()->user()->token()->revoke();

        
        SMS::send($user->phone, 'Dear '. $user->name .', Your password have been changed on RealEstate');

        if (Auth::check()) {
            $token = $user->createToken('Real Estate')->accessToken;
            return ResponseHelper::success('Successfully Change Password',$token);
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            auth()->user()->token()->revoke();
            return ResponseHelper::success('Successfully Logout',null);
        }
    }

    
}
