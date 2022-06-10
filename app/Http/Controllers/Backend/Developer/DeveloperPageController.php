<?php

namespace App\Http\Controllers\Backend\Developer;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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
        if ($developerUser['company_images'] == null) {
            $images = [];
            $images = json_encode($images);
        }else{
            $decode_images = $developerUser['company_images'];
            $images = [];
            foreach ($decode_images as $key => $image) {
                $images[] = [
                    'id' => $image,
                    'src' => asset(config('const.company_images')) . '/' . $image
                ];
            }
            $images = json_encode($images);
        }
        return view('backend.developer.profile',compact('developerUser','images'));
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
        /* Property Image */
        $company_images = [];
        if ($request->hasfile('images')) {
            $company_images = [];
            foreach ($request->file('images') as $image) {
                $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                Storage::disk('public')->put('/company_images/' . $file_name, file_get_contents($image));
                $company_images[] = $file_name;
            }
        }
        // Splice if not img 
        if ($request->old || $request->photos) {
            $old_data = $request->old ?? [];
            $count = count($request->file('photos') ?? []);
            $data = array_reverse($old_data);
            $splice_data = array_splice($data, $count);

            // Fetch Old Image
            // $store_data = json_decode($agentUser['company_images']);

            // Diff image
            $collection = collect($developerUser['company_images']);
            $diff_image = $collection->diff($splice_data);

            // Delete image
            if (!$diff_image->all() == []) {
                foreach ($diff_image as $key => $diff) {
                    Storage::disk('public')->delete('/company_images/' . $diff);
                }
            }

            // Get Remain Data from coming form
            foreach ($splice_data as $image) {
                $data[] = $image;
            }

            // Upload New image
            if ($request->hasfile('photos')) {
                foreach ($request->file('photos') as $image) {
                    $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                    Storage::disk('public')->put('/company_images/' . $file_name, file_get_contents($image));
                    $data[] = $file_name;
                }
            }
            // Splice No Need Data
            $company_images = array_splice($data, $count);
           
        }
        $developerUser->company_images = $company_images;
        $developerUser->company_name = $request->company_name;
        $developerUser->name = $request->name;
        $developerUser->email = $request->email;
        $developerUser->phone = $request->phone;
        $developerUser->other_phone = $request->other_phone ?? null;
        $developerUser->agent_type = $request->agent_type;
        $developerUser->address = $request->address;
        $developerUser->description = $request->description;
        $developerUser->password = $request->password ? Hash::make($request->password) : $developerUser->password;
        $developerUser->update();
        return redirect()->route('developer.property.index')->with('update', 'Successfully Updated');
    }
}
