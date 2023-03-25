<?php

namespace App\Http\Resources;

use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class AgentByProperties extends JsonResource
{
    
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if ($this->company_images) {
            $company_images = [];
            foreach ($this->company_images as $key => $image) {
                $company_images[] = asset(config('const.company_images')) . '/' .$image;
            }
        }
        $region = $this->region()->first('name');
        $township = $this->township()->first('name');
        $data = [];
        $data['id'] =  $this->id ?? null;
        $data['name'] =  $this->name ?? null;
        $data['email'] =  $this->email ?? null;
        $data['phone'] =  $this->phone ?? null;
        $data['other_phone'] =  $this->other_phone ?? [];
        $data['company_name'] =  $this->company_name ?? null;
        $data['region'] =  $region['name'] ?? null;
        $data['township'] =  $township['name'] ?? null;
        $data['address'] =  $this->address ?? null;
        $data['agent_type'] =  config('const.agent_type')[$this->agent_type] ?? null;
        $data['profile_photo'] =  $this->profile_photo ?? null;
        $data['cover_photo'] =  $this->cover_photo ?? null;
        $data['company_images'] = $company_images ?? [];
        $data['description'] =  $this->description ?? null;
        $data['count'] = $this->properties->count() ?? null;
        if (Auth::guard('api')->check()) {
            $follower = Follow::where('user_id',Auth::guard('api')->user()->id)->where('following_id',$this->id)->first();
            if ($follower) {
                $data['follower_status'] = 1;
            }else{
                $data['follower_status'] = 0;
            }
        }
        $data['properties'] = PropertiesDataByRelated::collection($this->whenLoaded('properties'));
        return $data;
    }
}
