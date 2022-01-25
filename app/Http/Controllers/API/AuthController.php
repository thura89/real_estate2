<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Helpers\SMS;
use Illuminate\Http\Request;
use App\Helpers\UUIDGenerate;
use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'user_type' => 'required|in:4,5,6',
            'agent_type' => 'required_if:user_type,==,4',
            'company_name' => 'required_if:user_type,!=,6',
            'address' => 'required',
            'profile_photo' => 'required|mimes:jpeg,bmp,png,jpg',
            'cover_photo' => 'required|mimes:jpeg,bmp,png,jpg',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:6|max:11|unique:users,phone',
        ]);

        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }
        $user = new User();
        if ($request->hasFile('profile_photo')) {
            $profile_img = $request->file('profile_photo');
            $profile_img_name = uniqid() . '_' . time() . '.' . $profile_img->extension();
            Storage::disk('public')->put('/profile/' . $profile_img_name, file_get_contents($profile_img));
        }
        if ($request->hasFile('cover_photo')) {
            $cover_img = $request->file('cover_photo');
            $cover_img_name = uniqid() . '_' . time() . '.' . $cover_img->extension();
            Storage::disk('public')->put('/cover/' . $cover_img_name, file_get_contents($cover_img));
        }
        $user->user_type = $request->user_type;
        $user->company_name = $request->company_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->user_type == 4) {
            $user->agent_type = $request->agent_type;
        }
        if ($request->google_id) {
            $user->google_id = $request->google_id;
        }
        if ($request->facebook_id) {
            $user->facebook_id = $request->facebook_id;
        }
        $user->address = $request->address;
        $user->description = $request->description;
        $user->profile_photo = $profile_img_name;
        $user->cover_photo = $cover_img_name;
        $user->password = Hash::make('123123123');
        $user->ip = $request->ip();
        $user->user_agent = $request->server('HTTP_USER_AGENT');
        $user->login_at = date('Y-m-d H:i:s');
        $user->save();

        $token = $user->createToken('Real Estate')->accessToken;

        return ResponseHelper::success('Successfully Create User', $token);
    }

    public function mobile_register(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users|email|max:60',
            'phone' => 'required|unique:users|max:11',
            'password' => 'required|confirmed|min:6|max:20',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email ?? null;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->verify_code = UUIDGenerate::vCodeGenerator();
        $user->save();

        SMS::send($user->phone, 'Dear ' . $user->name . ', Your verify_code is ' . $user->verify_code . ' from Future House RealEstate. Please continue...');
        return ResponseHelper::success('Successfully Created Verify code', null);
    }

    public function check_code(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'phone' => 'required|users|max:11',
            'verify_code' => 'required|digits:6',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }

        if ($request->phone) {
            $checkUser = User::where('phone', $request->phone)->select('updated_at', 'phone', 'verify_code')->first();
            if ($checkUser) {
                if ($request->verify_code == $checkUser->verify_code) {

                    $current_time = Carbon::now();
                    $totalDuration = $current_time->diffInSeconds($checkUser->updated_at);
                    if ($totalDuration < 180) {
                        return ResponseHelper::success('Success', 'Correct verify code');
                    } else {
                        return ResponseHelper::fail('Invalid code Expired', null);
                    }
                }
                return ResponseHelper::fail('Invalid Phone and Code', null);
            }
            return ResponseHelper::fail('Invalid Phone and Code', null);
        }
    }

    public function resend_verify_code(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'phone' => 'required|max:11',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }
        $user = User::where('phone', $request->phone)->first();
        if (isset($user)) {
            $user->verify_code = UUIDGenerate::vCodeGenerator();
            $user->update();
            SMS::send($user->phone, 'Dear ' . $user->name . ', Your verify_code is ' . $user->verify_code . ' from Future House RealEstate. Please continue...');
            return ResponseHelper::success('Successfully Created Verify code', null);
        }
        return ResponseHelper::fail('Fail to request', $validate->errors());
    }

    public function mobileRegisterFullInfo(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'verify_code' => 'required',
            'phone' => 'required',
            'user_type' => 'required|in:4,5,6',
            'agent_type' => 'required_if:user_type,==,4',
            'company_name' => 'required_if:user_type,!=,6',
            'address' => 'required',
            'profile_photo' => 'required|mimes:jpeg,bmp,png,jpg',
            'cover_photo' => 'required|mimes:jpeg,bmp,png,jpg',
        ]);

        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }
        $user =  User::where('verify_code', $request->verify_code)->where('phone', $request->phone)->first();
        if ($user) {
            if ($request->hasFile('profile_photo')) {
                $profile_img = $request->file('profile_photo');
                $profile_img_name = uniqid() . '_' . time() . '.' . $profile_img->extension();
                Storage::disk('public')->put('/profile/' . $profile_img_name, file_get_contents($profile_img));
            }
            if ($request->hasFile('cover_photo')) {
                $cover_img = $request->file('cover_photo');
                $cover_img_name = uniqid() . '_' . time() . '.' . $cover_img->extension();
                Storage::disk('public')->put('/cover/' . $cover_img_name, file_get_contents($cover_img));
            }
            $user->user_type = $request->user_type;
            $user->company_name = $request->company_name;
            if ($request->user_type == 4) {
                $user->agent_type = $request->agent_type;
            }
            $user->address = $request->address;
            $user->description = $request->description;
            $user->profile_photo = $profile_img_name;
            $user->cover_photo = $cover_img_name;
            $user->ip = $request->ip();
            $user->user_agent = $request->server('HTTP_USER_AGENT');
            $user->login_at = date('Y-m-d H:i:s');
            $user->update();

            $token = $user->createToken('Real Estate')->accessToken;

            return ResponseHelper::success('Successfully Create User', $token);
        } else {
            return ResponseHelper::fail('Invalid', " Can't find code, Please Resend verify code");
        }
    }
    public function forgetPassword_send_code(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'phone' => 'required',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }

        $user =  User::where('phone', $request->phone)->first();
        if ($user) {
            $user->verify_code = UUIDGenerate::vCodeGenerator();
            $user->update();
            SMS::send($user->phone, 'Dear ' . $user->name . ', Your password reset_code is ' . $user->verify_code . ' from Future House RealEstate. Please continue...');
            return ResponseHelper::success('Successfully Created reset_code', null);
        }
        return ResponseHelper::fail('Fail to request', 'Please Register');
    }
    public function resetPassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'verify_code' => 'required|digits:6',
            'password' => 'required|confirmed',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }

        $user =  User::where('verify_code', $request->verify_code)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->update();

            /* Send SMS */
            SMS::send($user->phone, 'Dear ' . $user->name . ', Your password have been changed on FutureHouse RealEstate.');

            $token = $user->createToken('Real Estate')->accessToken;
            return ResponseHelper::success('Successfully Change Password', $token);
        }
        return ResponseHelper::fail('Fail to request', 'Somthing Wrong!');
    }

    public function login(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            $user = auth()->user();
            $token = $user->createToken('Real Estate')->accessToken;
            return ResponseHelper::success('Successfully Login', $token);
        }
        return ResponseHelper::fail('Fail Login', null);
    }

    public function loginWithSocial(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users|email|max:60',
            'phone' => 'required|unique:users|max:11',
        ]);

        $socialUser = User::where('phone', $request->phone)->first();
        if ($socialUser) {
            if ($request->google_id) {
                $user = User::where('google_id', $request->google_id)->first();
                if ($user == null) {
                    return ResponseHelper::fail('Fail Login', null);
                }
                $token = $user->createToken('Real Estate')->accessToken;
                return ResponseHelper::success('Successfully Login', $token);
            }
            if ($request->facebook_id) {
                $user = User::where('facebook_id', $request->facebook_id)->first();
                if ($user == null) {
                    return ResponseHelper::fail('Fail Login', null);
                }
                $token = $user->createToken('Real Estate')->accessToken;
                return ResponseHelper::success('Successfully Login', $token);
            }
            if ($request->apple_id) {
                $user = User::where('apple_id', $request->apple_id)->first();
                if ($user == null) {
                    return ResponseHelper::fail('Fail Login', null);
                }
                $token = $user->createToken('Real Estate')->accessToken;
                return ResponseHelper::success('Successfully Login', $token);
            }
        }
        return ResponseHelper::fail('Fail Login', null);
    }

    public function changePassword(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request', $validate->errors());
        }

        $user =  User::findOrFail(auth()->user()->id);

        $user->password = Hash::make($request->password);
        $user->update();

        auth()->user()->token()->revoke();

        SMS::send($user->phone, 'Dear ' . $user->name . ', Your password have been changed on RealEstate');

        if (Auth::check()) {
            $token = $user->createToken('Real Estate')->accessToken;
            return ResponseHelper::success('Successfully Change Password', $token);
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            auth()->user()->token()->revoke();
            return ResponseHelper::success('Successfully Logout', null);
        }
    }
}
