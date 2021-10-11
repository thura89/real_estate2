<?php

namespace App\Http\Controllers\Backend\Developer;

use App\DeveloperUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateDeveloperUserRequest;

class DeveloperPageController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.developer.index');
    }

    public function profile(Request $request)
    {
        $developerUser = DeveloperUser::findOrFail(Auth()->user()->id);
        return view('backend.developer.profile',compact('developerUser'));
    }
    
    public function profile_update($id ,UpdateDeveloperUserRequest $request){
        $developerUser = DeveloperUser::findOrFail($id);
        $profile_img_name = $developerUser->images;
        
        if ($request->hasFile('images')) {
            Storage::disk('public')->delete('/developer/'.$developerUser->images);

            $profile_img = $request->file('images');
            $profile_img_name = uniqid().'_'.time().'.'.$profile_img->extension();
            Storage::disk('public')->put('/developer/'.$profile_img_name, file_get_contents($profile_img));
        }
        $developerUser->company_name = $request->company_name;
        $developerUser->email = $request->email;
        $developerUser->phone = $request->phone;
        $developerUser->address = $request->address;
        $developerUser->description = $request->description;
        $developerUser->images = $profile_img_name;
        $developerUser->password = $request->password ? Hash::make($request->password) : $developerUser->password;
        $developerUser->update();
        return redirect()->route('developer.dashboard')->with('update', 'Successfully Updated');
    }
}
