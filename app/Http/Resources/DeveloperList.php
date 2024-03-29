<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Follow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class DeveloperList extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $region = $this->region()->first('name');
        $township = $this->township()->first('name');

        $data = [];
        $data['id'] =  $this->id ?? null;
        $data['name'] =  $this->name ?? null;
        $data['company_name'] =  $this->company_name ?? null;
        $data['email'] =  $this->email ?? null;
        $data['phone'] =  $this->phone ?? null;
        $data['other_phone'] =  $this->other_phone ?? null;
        $data['region'] =  $region['name'] ?? null;
        $data['township'] =  $township['name'] ?? null;
        $data['address'] =  $this->address ?? null;
        $data['profile_photo'] =  $this->profile_photo ?? null;
        $data['cover_photo'] =  $this->cover_photo ?? null;
        $data['company_images'] =  $this->company_images ?? null;
        $data['post_count'] = $this->properties ? $this->properties->count() : null;
        if (Auth::guard('api')->check()) {
            $follower = Follow::where('user_id', Auth::guard('api')->user()->id)->where('following_id', $this->id)->first();
            if ($follower) {
                $data['follower_status'] = 1;
            } else {
                $data['follower_status'] = 0;
            }
        }
        $data['created_at'] = Carbon::parse($this->created_at)->format('d-m-y H:m:s');
        return $data;
    }
}