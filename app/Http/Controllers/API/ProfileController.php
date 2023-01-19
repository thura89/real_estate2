<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\API\ProfileDevUpdateResource;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $user = auth()->user();
        if($user){
            if ($user->user_type == config('const.Agent')) {
                $data = new ProfileResource($user);
                return ResponseHelper::success('Success',$data);
            } else {
                $data = new ProfileDevUpdateResource($user);
                return ResponseHelper::success('Success',$data);
            }    
                
        }
        return ResponseHelper::fail('Fail to request',null);
    }

    public function update_profile(Request $request)
    {
        $id = auth()->user()->id;
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'company_name' => 'required',
            'email' => [
                'required','email',
                Rule::unique('users')->ignore($id , 'id'),
            ],
            'phone' => [
                'required',
                Rule::unique('users')->ignore($id , 'id'),
            ],

            'user_type' => 'required|in:4,5,6',
            'agent_type' => 'required_if:user_type,==,4',
            'address' => 'required',
        ]);

        if ($validate->fails()) {
            return ResponseHelper::fail('Fail to request',$validate->errors());
        }

        $user = User::findOrFail($id);
        if ($request->hasFile('profile_photo')) {
            Storage::disk('public')->delete('/profile/'.$user->profile_photo);
            $profile_img = $request->file('profile_photo');
            $profile_img_name = uniqid().'_'.time().'.'.$profile_img->extension();
            Storage::disk('public')->put('/profile/'.$profile_img_name, file_get_contents($profile_img));
            $user->profile_photo = $profile_img_name;
        }
        if ($request->hasFile('cover_photo')) {
            Storage::disk('public')->delete('/cover/'.$user->cover_photo);
            $cover_img = $request->file('cover_photo');
            $cover_img_name = uniqid().'_'.time().'.'.$cover_img->extension();
            Storage::disk('public')->put('/cover/'.$cover_img_name, file_get_contents($cover_img));
            $user->cover_photo = $cover_img_name;
        }
        $user->company_name = $request->company_name;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->other_phone = $request->other_phone;
        $user->user_type = $request->user_type;
        if($request->user_type == 4){
            $user->agent_type = $request->agent_type;
        }
        $user->address = $request->address;
        $user->description = $request->description;

        /* Company Image */
        $company_images = $user->company_images ?? [];
        if ($request->hasfile('company_images')) {
            
            foreach ($request->file('company_images') as $image) {
                $file_name = uniqid() . '_' . time() . '.' . $image->extension();
                Storage::disk('public')->put('/company_images/' . $file_name, file_get_contents($image));
                $data_images[] = $file_name;
            }
            // $decode_images = json_decode($company_images);
            $company_images = array_merge($company_images,$data_images);
            
        }
        $user->company_images = $company_images;
        $user->update();

        if($user){
            if ($user->user_type == config('const.Agent')) {
                $data = new ProfileResource($user);
                return ResponseHelper::success('Success',$data);
            } else {
                $data = new ProfileDevUpdateResource($user);
                return ResponseHelper::success('Success',$data);
            }   
        }
    }

    
    public function DeleteCompanyImage(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'company_images' => 'required',
        ]);
        if ($validate->fails()) {
            return ResponseHelper::fail('Fail Request',$validate->errors());
        }
        
        $data = User::where('id',auth()->user()->id)->first();

        if (!$data) {
            return ResponseHelper::fail('Fail Request','Data not found');
        }
        $data_images = $data->company_images;
        $images = explode(',',$request->company_images);
        
        if ($data) {
            foreach ($images as $key => $del) {
                $rev = array_search($del, $data_images); 
                if ($rev !== false) {        
                    Storage::disk('public')->delete('/company_images/' . $data_images[$rev]);
                    unset($data_images[$rev]);
                }
            }
            $data->company_images = array_values($data_images);
            $data->push();
            return ResponseHelper::success('Success', 'Successfully Deleted');

        }
        
    }
}
