<?php

namespace App\Http\Controllers\Backend\Agent;

use App\AgentUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateAgentUserRequest;
use Illuminate\Support\Facades\Storage;

class AgentPageController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.agent.index');
    }

    public function profile(Request $request)
    {
        $agentUser = AgentUser::findOrFail(Auth()->user()->id);
        return view('backend.agent.profile',compact('agentUser'));
    }
    
    public function profile_update($id ,UpdateAgentUserRequest $request){
        $agentUser = AgentUser::findOrFail($id);
        $profile_img_name = $agentUser->images;
        
        if ($request->hasFile('images')) {
            Storage::disk('public')->delete('/agent/'.$agentUser->images);

            $profile_img = $request->file('images');
            $profile_img_name = uniqid().'_'.time().'.'.$profile_img->extension();
            Storage::disk('public')->put('/agent/'.$profile_img_name, file_get_contents($profile_img));
        }
        $agentUser->company_name = $request->company_name;
        $agentUser->email = $request->email;
        $agentUser->phone = $request->phone;
        $agentUser->address = $request->address;
        $agentUser->description = $request->description;
        $agentUser->images = $profile_img_name;
        $agentUser->password = $request->password ? Hash::make($request->password) : $agentUser->password;
        $agentUser->update();
        return redirect()->route('agent.property.index')->with('update', 'Successfully Updated');
    }
}
