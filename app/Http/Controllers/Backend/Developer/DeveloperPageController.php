<?php

namespace App\Http\Controllers\Backend\Developer;

use App\User;
use App\DeveloperUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateDeveloperUserRequest;
use App\Http\Requests\UpdateProfileDeveloperRequest;

class DeveloperPageController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.developer.index');
    }

    public function profile(Request $request)
    {
        $developerUser = User::findOrFail(Auth()->user()->id);
        return view('backend.developer.profile',compact('developerUser'));
    }
    
    public function profile_update($id ,UpdateProfileDeveloperRequest $request){
        $developerUser = User::findOrFail($id);
        if ($request->hasFile('profile_photo')) {
            Storage::disk('public')->delete('/profile/'.$developerUser->profile_photo);
            $profile_img = $request->file('profile_photo');
            $profile_img_name = uniqid().'_'.time().'.'.$profile_img->extension();
            Storage::disk('public')->put('/profile/'.$profile_img_name, file_get_contents($profile_img));
            $developerUser->profile_photo = $profile_img_name;
        }
        if ($request->hasFile('cover_photo')) {
            Storage::disk('public')->delete('/cover/'.$developerUser->cover_photo);
            $cover_img = $request->file('cover_photo');
            $cover_img_name = uniqid().'_'.time().'.'.$cover_img->extension();
            Storage::disk('public')->put('/cover/'.$cover_img_name, file_get_contents($cover_img));
            $developerUser->cover_photo = $cover_img_name;
        }
        $developerUser->company_name = $request->company_name;
        $developerUser->name = $request->name;
        $developerUser->email = $request->email;
        $developerUser->phone = $request->phone;
        $developerUser->agent_type = $request->agent_type;
        $developerUser->address = $request->address;
        $developerUser->description = $request->description;
        $developerUser->password = $request->password ? Hash::make($request->password) : $developerUser->password;
        $developerUser->update();
        return redirect()->route('developer.property.index')->with('update', 'Successfully Updated');
    }
}
