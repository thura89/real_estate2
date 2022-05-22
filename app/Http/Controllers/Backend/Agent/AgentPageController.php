<?php

namespace App\Http\Controllers\Backend\Agent;

use App\User;
use App\AgentUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateAgentUserRequest;
use App\Http\Requests\AgentProfileUpdateRequest;

class AgentPageController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.agent.index');
    }

    public function profile(Request $request)
    {
        $agentUser = User::findOrFail(Auth()->user()->id);
        if ($agentUser['company_images'] == null) {
            $images = [];
            $images = json_encode($images);
        }else{
            $decode_images = json_decode($agentUser['company_images']);
            $images = [];
            foreach ($decode_images as $key => $image) {
                $images[] = [
                    'id' => $image,
                    'src' => asset(config('const.company_images')) . '/' . $image
                ];
            }
            $images = json_encode($images);
        }
        
        return view('backend.agent.profile',compact('agentUser','images'));
    }
    
    public function profile_update($id ,AgentProfileUpdateRequest $request){
        $agentUser = User::findOrFail($id);
        if ($request->hasFile('profile_photo')) {
            Storage::disk('public')->delete('/profile/'.$agentUser->profile_photo);
            $profile_img = $request->file('profile_photo');
            $profile_img_name = uniqid().'_'.time().'.'.$profile_img->extension();
            Storage::disk('public')->put('/profile/'.$profile_img_name, file_get_contents($profile_img));
            $agentUser->profile_photo = $profile_img_name;
        }
        if ($request->hasFile('cover_photo')) {
            Storage::disk('public')->delete('/cover/'.$agentUser->cover_photo);
            $cover_img = $request->file('cover_photo');
            $cover_img_name = uniqid().'_'.time().'.'.$cover_img->extension();
            Storage::disk('public')->put('/cover/'.$cover_img_name, file_get_contents($cover_img));
            $agentUser->cover_photo = $cover_img_name;
        }
        $agentUser->company_name = $request->company_name;
        $agentUser->name = $request->name;
        $agentUser->email = $request->email;
        $agentUser->phone = $request->phone;
        $agentUser->agent_type = $request->agent_type;
        $agentUser->address = $request->address;
        $agentUser->description = $request->description;
        $agentUser->password = $request->password ? Hash::make($request->password) : $agentUser->password;
        $agentUser->update();
        return redirect()->route('agent.property.index')->with('update', 'Successfully Updated');
    }
}
