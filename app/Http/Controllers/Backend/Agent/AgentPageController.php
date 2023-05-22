<?php

namespace App\Http\Controllers\Backend\Agent;

use App\User;
use App\Region;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\AgentProfileUpdateRequest;

class AgentPageController extends Controller
{
    public function index(Request $request)
    {
        return view('backend.agent.index');
    }

    public function profile(Request $request)
    {
        $regions = Region::get(['name', 'id']);
        $agentUser = User::findOrFail(Auth()->user()->id);
        if ($agentUser['company_images'] == null) {
            $images = [];
            $images = json_encode($images);
        } else {
            $decode_images = $agentUser['company_images'];
            $images = [];
            foreach ($decode_images as $key => $image) {
                $images[] = [
                    'id' => $image,
                    'src' => asset(config('const.company_images')) . '/' . $image
                ];
            }
            $images = json_encode($images);
        }

        return view('backend.agent.profile', compact('agentUser', 'images', 'regions'));
    }

    public function profile_update($id, AgentProfileUpdateRequest $request)
    {
        $agentUser = User::findOrFail($id);
        if ($request->hasFile('profile_photo')) {
            Storage::disk('public')->delete('/profile/' . $agentUser->profile_photo);
            $profile_img = $request->file('profile_photo');
            $profile_img_name = uniqid() . '_' . time() . '.' . $profile_img->extension();
            Storage::disk('public')->put('/profile/' . $profile_img_name, file_get_contents($profile_img));
            $agentUser->profile_photo = $profile_img_name;
        }
        if ($request->hasFile('cover_photo')) {
            Storage::disk('public')->delete('/cover/' . $agentUser->cover_photo);
            $cover_img = $request->file('cover_photo');
            $cover_img_name = uniqid() . '_' . time() . '.' . $cover_img->extension();
            Storage::disk('public')->put('/cover/' . $cover_img_name, file_get_contents($cover_img));
            $agentUser->cover_photo = $cover_img_name;
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
            $collection = collect($agentUser['company_images']);
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
        $agentUser->company_images = $company_images;
        $agentUser->company_name = $request->company_name;
        $agentUser->name = $request->name;
        $agentUser->email = $request->email;
        $agentUser->phone = $request->phone;
        $agentUser->other_phone = $request->other_phone ?? null;
        $agentUser->agent_type = $request->agent_type;
        $agentUser->address = $request->address;
        $agentUser->region = $request->region ?? $agentUser->region;
        $agentUser->township = $request->township ?? $agentUser->township;
        $agentUser->description = $request->description;
        $agentUser->password = $request->password ? Hash::make($request->password) : $agentUser->password;
        $agentUser->update();
        return redirect()->route('agent.property.index')->with('update', 'Successfully Updated');
    }
}
